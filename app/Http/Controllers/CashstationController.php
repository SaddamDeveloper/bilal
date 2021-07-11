<?php

namespace App\Http\Controllers;

use App\Http\Resources\CashstationByMapRescource;
use App\Http\Resources\CashstationResource;
use App\Http\Resources\UserResource;
use App\Models\Cashstation;
use App\Models\CashstationComment;
use App\Models\CashstationReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use TeamPickr\DistanceMatrix\Frameworks\Laravel\DistanceMatrix;
use TeamPickr\DistanceMatrix\Licenses\StandardLicense;

class CashstationController extends Controller
{
    public function __construct(CashstationComment $comments, CashstationReview $reviews)
    {
        $this->comments = $comments;
        $this->reviews = $reviews;
    }

    public function index(Request $request)
    {
        $nearby = $request->nearby;
        $rates = $request->rates;
        $ratings = $request->ratings;
        $cashstations = Cashstation::leftjoin('transactions', 'transactions.sender_id', '=', 'cashstations.id')
            ->with('user')
            ->withCount('comments', 'reviews')
            ->withCount(['reviews as average_review' => function ($query) {
                $query->select(DB::raw('floor(avg(review))'));
            }])->paginate(config('wallex.defaultPaginationLimit'));

        $response = [
            'status' => true,
            'data' => CashstationResource::collection($cashstations)
        ];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $cashstation = Cashstation::with('user')->find($id);
        $response = [
            'data' => CashstationResource::make($cashstation)
        ];
        return response()->json($response, 200);
    }

    public function comments(Request $request)
    {
        $user = $request->user();
        $rules = [
            'limit' => 'required|numeric',
            'offset' => 'required|numeric'
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        if ($request->offset == 0) {
            return response()->json(['message' => 'Offset must begin with 1', 'data' => []], 422);
        }
        $offset = ($request->offset - 1) * $request->limit;
        $data = $this->comments::getComment($user->id, $offset, $request->limit);

        if (count($data) > 0) {

            $response = [
                "meta_data" => [
                    "page" => (int) $request->offset,
                    "total_count" => count($data)
                ],
                "data" => $data,
                "message" => "Succesfully get comments"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get comments', 'data' => []], 404);
    }

    public function reviews(Request $request)
    {
        $user = $request->user();
        $rules = [
            'limit' => 'required|numeric',
            'offset' => 'required|numeric'
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        if ($request->offset == 0) {
            return response()->json(['message' => 'Offset must begin with 1', 'data' => []], 422);
        }
        $offset = ($request->offset - 1) * $request->limit;
        $data = $this->reviews::getReview($user->id, $offset, $request->limit);
        if (count($data) > 0) {

            $response = [
                "meta_data" => [
                    "page" => (int) $request->offset,
                    "total_count" => count($data)
                ],
                "data" => $data,
                "message" => "Succesfully get reviews"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get reviews', 'data' => []], 404);
    }

    public function addComments(Request $request)
    {
        $user = $request->user();
        $rules = [
            'comment' => 'required',
            'cashstation_id' => 'required|numeric'
        ];
        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {
            $cashstation_comment = new CashstationComment();
            $cashstation_comment->user_id = $user->id;
            $cashstation_comment->cashstation_id = $request->cashstation_id;
            $cashstation_comment->comment = $request->comment;

            if ($cashstation_comment->save()) {
                $response = [
                    'message' => 'Comment added successfully',
                    'data' => []
                ];
                return response()->json($response, 200);
            }

            return response()->json(['message' => 'Failed added blacklist', 'data' => []], 400);
        } catch (\Exception $e) {
            return $e;
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }
    }

    public function byMap()
    {
        $cashstations = Cashstation::with('user')->paginate(config('wallex.defaultPaginationLimit'));
        $response = [
            'status' => true,
            'data' => CashstationByMapRescource::collection($cashstations)
        ];
        return response()->json($response, 200);
    }
}
