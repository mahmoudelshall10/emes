<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\ServiceForm;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ServiceFormsApi extends Controller
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
               "data"=>ServiceForm::orderBy('id','desc')->paginate(15)
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
                         'user_id'=>'required|numeric',
             'project_location'=>'required|numeric',
             'business_requirements'=>'required',
             'other_country'=>'required|string',
             'additional_attachments'=>'required',
             'linked_files'=>'required|url',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'user_id'=>trans('admin.user_id'),
             'project_location'=>trans('admin.project_location'),
             'business_requirements'=>trans('admin.business_requirements'),
             'other_country'=>trans('admin.other_country'),
             'additional_attachments'=>trans('admin.additional_attachments'),
             'linked_files'=>trans('admin.linked_files'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('additional_attachments')){
              $data['additional_attachments'] = it()->upload('additional_attachments','serviceforms');
              }
        $create = ServiceForm::create($data); 

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
                $show =  ServiceForm::find($id);
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
             'user_id'=>'required|numeric',
             'project_location'=>'required|numeric',
             'business_requirements'=>'required',
             'other_country'=>'required|string',
             'additional_attachments'=>'required',
             'linked_files'=>'required|url',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'user_id'=>trans('admin.user_id'),
             'project_location'=>trans('admin.project_location'),
             'business_requirements'=>trans('admin.business_requirements'),
             'other_country'=>trans('admin.other_country'),
             'additional_attachments'=>trans('admin.additional_attachments'),
             'linked_files'=>trans('admin.linked_files'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('additional_attachments')){
              it()->delete(ServiceForm::find($id)->additional_attachments);
              $data['additional_attachments'] = it()->upload('additional_attachments','serviceforms');
               }
              ServiceForm::where('id',$id)->update($data);

              $ServiceForm = ServiceForm::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $ServiceForm
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
               $serviceforms = ServiceForm::find($id);

               it()->delete($serviceforms->additional_attachments);
               it()->delete('serviceform',$id);

               @$serviceforms->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$serviceforms = ServiceForm::find($id);

                    	it()->delete($serviceforms->additional_attachments);
                    	it()->delete('serviceform',$id);
                    	@$serviceforms->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $serviceforms = ServiceForm::find($data);
 
                    	it()->delete($serviceforms->additional_attachments);
                    	it()->delete('serviceform',$data);

                    @$serviceforms->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}