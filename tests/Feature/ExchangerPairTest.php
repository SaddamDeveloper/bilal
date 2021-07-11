<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Pair;

class ExchangerPairTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_list_all_pair() {
        $offset = 1;
        $limit = 20;
        $group = "all";
        $alpha = null;

        $data = Pair::getPair($group,$offset-1,$limit,$group,$alpha)->toArray();
        $response = [
               "meta_data"=>[
                    "page"=> (int) $offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

        $this->get(route('exchanger.pair',['group'=>$group,'limit'=>$limit,'offset'=>$offset]))
            ->assertStatus(200)
            ->assertJson($response)
            ->assertJsonStructure([
                'meta_data'=>[
                    'page',
                    'total_count'
                ],
                'data'=>[
                    0=>[
                        'platform', 
                        'currency', 
                        'currency_code',
                    ],
                ],
                'message'
            ]);
    }

    public function test_list_all_pair_groupby_letter_a() {
        $offset = 1;
        $limit = 20;
        $group = "all";
        $alpha = "a";

        $data = Pair::getPair($group,$offset-1,$limit,$group,$alpha)->toArray();
        $response = [
               "meta_data"=>[
                    "page"=> (int) $offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

        $this->get(route('exchanger.pair',['group'=>$group,'alpha'=>$alpha,'limit'=>$limit,'offset'=>$offset]))
            ->assertStatus(200)
            ->assertJson($response)
            ->assertJsonStructure([
                'meta_data'=>[
                    'page',
                    'total_count'
                ],
                'data'=>[
                    0=>[
                        'platform', 
                        'currency', 
                        'currency_code',
                    ],
                ],
                'message'
            ]);
    }

    public function test_list_all_pair_on_another_page_offset() {
        
        $limit = 20;
        $group = "all";
        $alpha = null;

        for ($i=1; $i < $limit ; $i++) { 

            $offset = $i;
            $offsetdb = ($offset-1) * $limit;

            $data = Pair::getPair($group,$offsetdb,$limit,$group,$alpha)->toArray();

            if (count($data)>0){
                $response = [
                   "meta_data"=>[
                        "page"=> (int) $offset,
                        "total_count"=>count($data)
                   ],
                   "data"=> $data,
                   "message"=>"Succesfully get pairs"
                ];
                $http_code = 200;

                $structure = [
                    'meta_data'=>[
                        'page',
                        'total_count'
                    ],
                    'data'=>[
                        0=>[
                            'platform', 
                            'currency', 
                            'currency_code',
                        ],
                    ],
                    'message'
                ];

            } else {
               $response = ['message' => 'Failed get pairs', 'data' =>[]];
               $http_code = 404;
               $structure = [
                    'data',
                    'message'
               ];
            }

            $this->get(route('exchanger.pair',['group'=>$group,'alpha'=>$alpha,'limit'=>$limit,'offset'=>$offset]))
                ->assertJson($response)
                ->assertStatus($http_code)
                ->assertJsonStructure($structure);
        }
    }

    public function test_list_pair_by_currency() {
        $offset = 1;
        $limit = 20;
        $group = "currency";
        $code = "usd";

        $data = Pair::getPair($group,$offset-1,$limit,$group,$code)->toArray();
        $response = [
               "meta_data"=>[
                    "page"=> (int) $offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

        $this->get(route('exchanger.pair',['group'=>$group,'code'=>$code,'limit'=>$limit,'offset'=>$offset]))
            ->assertStatus(200)
            ->assertJson($response)
            ->assertJsonStructure([
                'meta_data'=>[
                    'page',
                    'total_count'
                ],
                'data'=>[
                    0=>[
                        'platform', 
                        'currency', 
                        'currency_code',
                    ],
                ],
                'message'
            ]);
    }

    public function test_list_pair_by_currency_on_another_page_offset() {
        $limit = 20;
        $group = "currency";
        $code = "usd";

        for ($i=1; $i < $limit ; $i++) { 

            $offset = $i;
            $offsetdb = ($offset-1) * $limit;

            $data = Pair::getPair($group,$offsetdb,$limit,$group,$code)->toArray();
            if (count($data)>0){
                $response = [
                   "meta_data"=>[
                        "page"=> (int) $offset,
                        "total_count"=>count($data)
                   ],
                   "data"=> $data,
                   "message"=>"Succesfully get pairs"
                ];
                $http_code = 200;

                $structure = [
                    'meta_data'=>[
                        'page',
                        'total_count'
                    ],
                    'data'=>[
                        0=>[
                            'platform', 
                            'currency', 
                            'currency_code',
                        ],
                    ],
                    'message'
                ];

            } else {
               $response = ['message' => 'Failed get pairs', 'data' =>[]];
               $http_code = 404;
               $structure = [
                    'data',
                    'message'
               ];
            }

            $this->get(route('exchanger.pair',['group'=>$group,'code'=>$code,'limit'=>$limit,'offset'=>$offset]))
                ->assertStatus($http_code)
                ->assertJson($response)
                ->assertJsonStructure($structure);
        }
    }

    public function test_find_a_pair() {
        $offset = 1;
        $limit = 20;
        $q = "visa dollar";

        $data = Pair::findPair($q,$offset-1,$limit)->toArray();
        $response = [
               "meta_data"=>[
                    "page"=> (int) $offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

        $this->get(route('exchanger.pair.find',['q'=>$q,'limit'=>$limit,'offset'=>$offset]))
            ->assertStatus(200)
            ->assertJson($response)
            ->assertJsonStructure([
                'meta_data'=>[
                    'page',
                    'total_count'
                ],
                'data'=>[
                    0=>[
                        'platform', 
                        'currency', 
                        'currency_code',
                    ],
                ],
                'message'
            ]);
    }

    public function test_list_pair_by_group() {
        $offset = 1;
        $limit = 20;
        $group = "card";

        $data = Pair::getPair($group,$offset-1,$limit)->toArray();
        $response = [
               "meta_data"=>[
                    "page"=> (int) $offset,
                    "total_count"=>count($data)
               ],
               "data"=> $data,
               "message"=>"Succesfully get pairs"
            ];

        $this->get(route('exchanger.pair',['group'=>$group,'limit'=>$limit,'offset'=>$offset]))
            ->assertStatus(200)
            ->assertJson($response)
            ->assertJsonStructure([
                'meta_data'=>[
                    'page',
                    'total_count'
                ],
                'data'=>[
                    0=>[
                        'platform', 
                        'currency', 
                        'currency_code',
                    ],
                ],
                'message'
            ]);
    }

    public function test_list_pair_by_group_on_another_page_offset() {
        $limit = 20;
        $group = "card";

        for ($i=1; $i < $limit ; $i++) { 
            $offset = $i;
            $offsetdb = ($offset-1) * $limit;
            $data = Pair::getPair($group,$offsetdb,$limit)->toArray();
                
            if (count($data)>0){
                $response = [
                   "meta_data"=>[
                        "page"=> (int) $offset,
                        "total_count"=>count($data)
                   ],
                   "data"=> $data,
                   "message"=>"Succesfully get pairs"
                ];
                $http_code = 200;

                $structure = [
                    'meta_data'=>[
                        'page',
                        'total_count'
                    ],
                    'data'=>[
                        0=>[
                            'platform', 
                            'currency', 
                            'currency_code',
                        ],
                    ],
                    'message'
                ];

            } else {
               $response = ['message' => 'Failed get pairs', 'data' =>[]];
               $http_code = 404;
               $structure = [
                    'data',
                    'message'
               ];
            }

            $this->get(route('exchanger.pair',['group'=>$group,'limit'=>$limit,'offset'=>$offset]))
                ->assertStatus($http_code)
                ->assertJson($response)
                ->assertJsonStructure($structure);
        }
    }

}
