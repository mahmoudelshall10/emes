<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Team;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class TeamsApi extends Controller
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
               "data"=>Team::orderBy('id','desc')->paginate(15)
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
                         'career_id'=>'required|numeric',
             'user_id'=>'required|numeric',
             'career_type'=>'required|string',
             'rate_range_monthly_from'=>'required|numeric|date_format:Y-m-d',
             'rate_range_monthly_to'=>'required|numeric',
             'rate_range_hourly_from'=>'required|numeric',
             'rate_range_hourly_to'=>'required|numeric',
             'cv_file'=>'required|'.it()->image().'',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'career_id'=>trans('admin.career_id'),
             'user_id'=>trans('admin.user_id'),
             'career_type'=>trans('admin.career_type'),
             'rate_range_monthly_from'=>trans('admin.rate_range_monthly_from'),
             'rate_range_monthly_to'=>trans('admin.rate_range_monthly_to'),
             'rate_range_hourly_from'=>trans('admin.rate_range_hourly_from'),
             'rate_range_hourly_to'=>trans('admin.rate_range_hourly_to'),
             'cv_file'=>trans('admin.cv_file'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
               if(request()->hasFile('cv_file')){
              $data['cv_file'] = it()->upload('cv_file','teams');
              }
        $create = Team::create($data); 

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
                $show =  Team::find($id);
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
             'career_id'=>'required|numeric',
             'user_id'=>'required|numeric',
             'career_type'=>'required|string',
             'rate_range_monthly_from'=>'required|numeric|date_format:Y-m-d',
             'rate_range_monthly_to'=>'required|numeric',
             'rate_range_hourly_from'=>'required|numeric',
             'rate_range_hourly_to'=>'required|numeric',
             'cv_file'=>'required|'.it()->image().'',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'career_id'=>trans('admin.career_id'),
             'user_id'=>trans('admin.user_id'),
             'career_type'=>trans('admin.career_type'),
             'rate_range_monthly_from'=>trans('admin.rate_range_monthly_from'),
             'rate_range_monthly_to'=>trans('admin.rate_range_monthly_to'),
             'rate_range_hourly_from'=>trans('admin.rate_range_hourly_from'),
             'rate_range_hourly_to'=>trans('admin.rate_range_hourly_to'),
             'cv_file'=>trans('admin.cv_file'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
               if(request()->hasFile('cv_file')){
              it()->delete(Team::find($id)->cv_file);
              $data['cv_file'] = it()->upload('cv_file','teams');
               }
              Team::where('id',$id)->update($data);

              $Team = Team::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Team
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
               $teams = Team::find($id);

               it()->delete($teams->cv_file);
               it()->delete('team',$id);

               @$teams->delete();
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$teams = Team::find($id);

                    	it()->delete($teams->cv_file);
                    	it()->delete('team',$id);
                    	@$teams->delete();
                    }
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $teams = Team::find($data);
 
                    	it()->delete($teams->cv_file);
                    	it()->delete('team',$data);

                    @$teams->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}