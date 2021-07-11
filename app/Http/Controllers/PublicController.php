<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Escrow;
use App\Models\Currency;
use Validator;

class PublicController extends Controller
{
    public function __construct(Escrow $escrow, Currency $currency)
    {
        $this->escrow = $escrow;
        $this->currency = $currency;
    }

    public function recentTransaction(Request $request)
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

        $data = $this->escrow::getRecentTransaction($offset, $request->limit);

        if (count($data)>0){
         
            $response = [
               "meta_data"=>[
                    "page"=> (int) $request->offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get recent transaction"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get recent transaction', 'data' =>[]], 404);

    }

    public function newestCurrency(Request $request)
    {
        $rules = [
            'limit'=>'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()){
            return response()->json(['message' => $validate->errors()->first(), 'data' => []], 422);
        }

        $data = $this->currency::getNewestCurrency($request->limit);

        if (count($data)>0){
         
            $response = [
               "meta_data"=>[
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get newest currency"
            ];

            return response()->json($response, 200);
        }

        return response()->json(['message' => 'Failed get newest currency', 'data' =>[]], 404);

    }

}
