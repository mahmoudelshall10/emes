<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class UserApi extends Controller
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
               "data"=>User::orderBy('id','desc')->paginate(15)
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
                         'first_name'=>'required|string',
             'last_name'=>'required|string',
             'date_of_birth'=>'required|date|date_format:Y-m-d',
             'company_name'=>'nullable|sometimes|string',
             'nationality'=>'required|string',
             'country_of_residence'=>'required|string',
             'mobile_number'=>'nullable|sometimes|string',
             'phone_number'=>'nullable|sometimes|string',
             'position'=>'nullable|sometimes|string',
             'account_status'=>'numeric',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'first_name'=>trans('admin.first_name'),
             'last_name'=>trans('admin.last_name'),
             'date_of_birth'=>trans('admin.date_of_birth'),
             'company_name'=>trans('admin.company_name'),
             'nationality'=>trans('admin.nationality'),
             'country_of_residence'=>trans('admin.country_of_residence'),
             'mobile_number'=>trans('admin.mobile_number'),
             'phone_number'=>trans('admin.phone_number'),
             'position'=>trans('admin.position'),
             'account_status'=>trans('admin.account_status'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
        $create = User::create($data); 

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
                $show =  User::find($id);
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
             'first_name'=>'required|string',
             'last_name'=>'required|string',
             'date_of_birth'=>'required|date|date_format:Y-m-d',
             'company_name'=>'nullable|sometimes|string',
             'nationality'=>'required|string',
             'country_of_residence'=>'required|string',
             'mobile_number'=>'nullable|sometimes|string',
             'phone_number'=>'nullable|sometimes|string',
             'position'=>'nullable|sometimes|string',
             'account_status'=>'numeric',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'first_name'=>trans('admin.first_name'),
             'last_name'=>trans('admin.last_name'),
             'date_of_birth'=>trans('admin.date_of_birth'),
             'company_name'=>trans('admin.company_name'),
             'nationality'=>trans('admin.nationality'),
             'country_of_residence'=>trans('admin.country_of_residence'),
             'mobile_number'=>trans('admin.mobile_number'),
             'phone_number'=>trans('admin.phone_number'),
             'position'=>trans('admin.position'),
             'account_status'=>trans('admin.account_status'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              User::where('id',$id)->update($data);

              $User = User::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $User
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
               $user = User::find($id);


               @$user->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$user = User::find($id);

                    	@$user->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $user = User::find($data);
 

                    @$user->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}