<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Alert;
use App\Models\Blacklist;
use App\Models\Bindings;
use App\Models\Platform;
use App\Models\Ratings;
use Validator;

class OrderController extends Controller
{
    public function __construct(Favorite $favorite, Alert $alert, Blacklist $blacklist, Bindings $bindings, Ratings $ratings)
    {
        $this->favorite = $favorite;
        $this->alert = $alert;
        $this->blacklist = $blacklist;
        $this->bindings = $bindings;
        $this->ratings = $ratings;
    }

    public function getFavorite(Request $request)
    {

        $user = $request->user();
        
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

        $plaform = ($request->platform && !empty($request->platform)) ? $request->platform : null;

        $currency_code = ($request->currency_code && !empty($request->currency_code)) ? $request->currency_code : null;
        
        $data = $this->favorite::getFavorite($user->id ,$offset, $request->limit, $plaform, $currency_code);

        if (count($data)>0){
            
            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get favorites"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get favorites', 'data' =>[]], 404);

    }

    public function delFavorite(Request $request)
    {
        $rules = [
            'id'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {

            $fav = $this->favorite::find($request->id);

            if ($fav){
                if ($fav->delete()){
                    return response()->json(['message' => 'Succesfully delete favorite', 'data' => []], 200);
                }
            }

            return response()->json(['message' => 'Failed delete favorite', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }

    }

    public function getAlert(Request $request)
    {

        $user = $request->user();
        
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

        $plaform = ($request->platform && !empty($request->platform)) ? $request->platform : null;

        $currency_code = ($request->currency_code && !empty($request->currency_code)) ? $request->currency_code : null;
        
        $data = $this->alert::getAlert($user->id ,$offset, $request->limit, $plaform, $currency_code);

        if (count($data)>0){
            
            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get alerts"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get alerts', 'data' =>[]], 404);

    }

    public function delAlert(Request $request)
    {
        $rules = [
            'id'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {

            $fav = $this->alert::find($request->id);

            if ($fav){
                if ($fav->delete()){
                    return response()->json(['message' => 'Succesfully delete alert', 'data' => []], 200);
                }
            }

            return response()->json(['message' => 'Failed delete alert', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }

    }

    public function getBlacklist(Request $request){
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

        $user = $request->user();
        
        $data = $this->blacklist::getBlacklist($user->id, $offset, $request->limit);

        if (count($data)>0){
            
            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get blacklists"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get blacklists', 'data' =>[]], 404);
    }

    public function storeBlacklist(Request $request){
        $rules = [
            'blacklisted_username'=>'required | unique:blacklists',
            'comments'=>'required'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        $user = $request->user();

        try {

            $bl = new Blacklist;
            $bl->blacklisted_username = $request->blacklisted_username;
            $bl->comments = $request->comments;
            $bl->user_id = $user->id;

            if ($bl->save()){
                return response()->json(['message' => 'Succesfully added blacklist', 'data' => []], 200);
            }

            return response()->json(['message' => 'Failed added blacklist', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }
    }

    public function delBlacklist(Request $request){
        $rules = [
            'id'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {

            $bl = $this->blacklist::find($request->id);

            if ($bl){
                if ($bl->delete()){
                    return response()->json(['message' => 'Succesfully delete blacklist', 'data' => []], 200);
                }
            }

            return response()->json(['message' => 'Failed delete blacklist', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }
    }

    public function getBindings(Request $request){
        
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

        $user = $request->user();

        $platform = ($request->platform && !empty($request->platform)) ? $request->platform : null;
        
        $data = $this->bindings::getBindings($user->id, $offset, $request->limit, $platform);

        if (count($data)>0){
            
            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get bindings"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get bindings', 'data' =>[]], 404);
    }

    public function storeBindings(Request $request){
        
        $user = $request->user();

        $rules = [
            'platform_id'=> 'required|numeric',
            'account_info'=>'required'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {

            if (!Platform::find($request->platform_id)){
                return response()->json(['message' => 'platform_id not valid.', 'data' => []], 422);
            }

            $bd = Bindings::where("platform_id",$request->platform_id)->first();

            if (!$bd){
                $bd = new Bindings;
            }

            $bd->platform_id = $request->platform_id;
            $bd->account_info = $request->account_info;
            $bd->user_id = $user->id;

            if ($bd->save()){
                return response()->json(['message' => 'Succesfully added binding', 'data' => []], 200);
            }

            return response()->json(['message' => 'Failed added binding', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }
    }

    public function delBindings(Request $request){
        $rules = [
            'id'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        try {

            $bd = $this->bindings::find($request->id);

            if ($bd){
                if ($bd->delete()){
                    return response()->json(['message' => 'Succesfully delete bindings', 'data' => []], 200);
                }
            }

            return response()->json(['message' => 'Failed delete bindings', 'data' => []], 400);

        } catch (Exception $e) {
            return response()->json(['message' => 'Internal Error', 'data' => []], 500);
        }
    }

    public function getRatings(Request $request)
    {

        $user = $request->user();
        
        $data = $this->ratings::getRatings($user->id);

        if ($data){
            
            $response = [
               "data"=> $data,
               "message"=>"Succesfully get ratings"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get ratings', 'data' =>[]], 404);

    }

}
