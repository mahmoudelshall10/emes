<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Country;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class CountriesApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Country::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'country_name'=>'required|string',
             'country_code'=>'required|string',
             'country_symbol'=>'required|string',
             'country_landmark_image'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'country_name'=>trans('admin.country_name'),
             'country_code'=>trans('admin.country_code'),
             'country_symbol'=>trans('admin.country_symbol'),
             'country_landmark_image'=>trans('admin.country_landmark_image'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('country_landmark_image')){
              $data['country_landmark_image'] = it()->upload('country_landmark_image','countries');
              }
        $create = Country::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Country::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'country_name'=>'required|string',
             'country_code'=>'required|string',
             'country_symbol'=>'required|string',
             'country_landmark_image'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'country_name'=>trans('admin.country_name'),
             'country_code'=>trans('admin.country_code'),
             'country_symbol'=>trans('admin.country_symbol'),
             'country_landmark_image'=>trans('admin.country_landmark_image'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('country_landmark_image')){
              it()->delete(Country::find($id)->country_landmark_image);
              $data['country_landmark_image'] = it()->upload('country_landmark_image','countries');
               }
              Country::where('id',$id)->update($data);

              $Country = Country::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Country
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $countries = Country::find($id);

               it()->delete($countries->country_landmark_image);
               it()->delete('country',$id);

               @$countries->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$countries = Country::find($id);

                    	it()->delete($countries->country_landmark_image);
                    	it()->delete('country',$id);
                    	@$countries->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $countries = Country::find($data);
 
                    	it()->delete($countries->country_landmark_image);
                    	it()->delete('country',$data);

                    @$countries->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}