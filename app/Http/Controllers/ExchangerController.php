<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pair;
use App\Models\Escrow;
use App\Models\Currency;
use App\Models\Offer;
use App\Models\UserBalance;
use Validator;

class ExchangerController extends Controller
{
    public function __construct(Pair $pair, Escrow $escrow, Currency $currency)
    {
        $this->pair = $pair;
        $this->escrow = $escrow;
        $this->currency = $currency;
    }

    public function getPair(Request $request)
    {

        $group = $request->group;

        $rules = [
            'group'=>'required',
            'limit'=>'required|numeric',
            'offset'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        if ($request->offset==0){
            return response()->json(['message' => 'Offset must begin with 1', 'data' => []], 422);
        }

        $offset = ($request->offset-1) * $request->limit;

        $alpha = ((isset($request->alpha) && !empty($request->alpha))) ? $request->alpha : null;
        $code = ((isset($request->code) && !empty($request->code))) ? $request->code : null;

        if ($group=="currency"){
            $data = $this->pair::getPair($group, $offset, $request->limit, $code, $alpha);
        } else {
            $data = $this->pair::getPair($group, $offset, $request->limit);
        }

        if (count($data)>0){

            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get pairs', 'data' =>[]], 404);

    }

    public function findPair(Request $request)
    {

        $rules = [
            'q'=>'required',
            'limit'=>'required|numeric',
            'offset'=>'required|numeric'
        ];

        if (isset($request->filter)){
            $rules['query'] = 'required';
        }

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        if ($request->offset==0){
            return response()->json(['message' => 'Offset must begin with 1', 'data' => []], 422);
        }

        $offset = ($request->offset-1) * $request->limit;

        if (isset($request->filter)){
            $data = $this->pair::findPair($request->q, $offset, $request->limit);
        } else {
            $data = $this->pair::findPair($request->q, $offset, $request->limit);
        }

        if (count($data)>0){

            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get pairs', 'data' =>[]], 404);

    }

    public function getCountry(Request $request)
    {

        $rules = [
            'limit'=>'required|numeric',
            'offset'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        if ($request->offset==0){
            return response()->json(['message' => 'Offset must begin with 1', 'data' => []], 422);
        }

        $offset = ($request->offset-1) * $request->limit;

        $published = (isset($request->published)) ? $request->published : null;

        $data = $this->currency::getCountry($offset, $request->limit, $published);

        if (count($data)>0){

            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get currencies"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get currencies', 'data' =>[]], 404);

    }

    public function newOffer(Request $request)
    {

        $rules = [
            'platform'=>'required',
            'exchange.currency'=>'required',
            'exchange.direction'=>'required',
            'give'=>'required|numeric',
            'get'=>'required|numeric',
            'insurance'=>'required|numeric',
            'account'=>'required|email',
            'min_certificate'=>['required','regex:(any|formal|personal|merchant)'],
            'min_rating'=>'required'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        $pair = Pair::getPairByPlatformName(strtoupper($request->input('platform')));

        $user_balance = UserBalance::getBalance($request->user()->id, strtoupper($request->input('platform')));

        if ($request->user()->user_limit>0){} else {
            return response()->json(['message' => "Limit reached.", 'data' => []], 422);
        }

        if ((int)$request->input('give')>(int)$user_balance){
            return response()->json(['message' => "Not enough balance.", 'data' => []], 422);
        }

        try {

            $offer = new Offer;
            $offer->get = $request->input('get');
            $offer->give = $request->input('give');
            $offer->user_id = $request->user()->id;
            $offer->pair_id = $pair->id;
            $offer->rating = $request->input('min_rating');
            $offer->additional_information = $request->input('information');
            $offer->insurance = $request->input('insurance');
            $offer->status = "0%";
            $offer->origin = "new";
            $offer->save();

            if ($offer->save()){

                $response = [
                   "data"=> [],
                   "message"=>"Succesfully added offer"
                ];

                return response()->json($response, 200);
            }

            return response()->json(['message' => 'Failed added offer', 'data' =>[]], 422);

        } catch (\Exception $e) {
            \Log::error($e);
            return response()->json(['message' => 'Internal server error', 'data' =>[]], 500);
        }

    }

}
