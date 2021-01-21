<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\TeamsDataTable;
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
class Teams extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(TeamsDataTable $teams)
            {
               return $teams->render('admin.teams.index',['title'=>trans('admin.teams')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.teams.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Store a newly created resource in storage.
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
              $data = $this->validate(request(),$rules,[],[
             'career_id'=>trans('admin.career_id'),
             'user_id'=>trans('admin.user_id'),
             'career_type'=>trans('admin.career_type'),
             'rate_range_monthly_from'=>trans('admin.rate_range_monthly_from'),
             'rate_range_monthly_to'=>trans('admin.rate_range_monthly_to'),
             'rate_range_hourly_from'=>trans('admin.rate_range_hourly_from'),
             'rate_range_hourly_to'=>trans('admin.rate_range_hourly_to'),
             'cv_file'=>trans('admin.cv_file'),

              ]);
		
               if(request()->hasFile('cv_file')){
              $data['cv_file'] = it()->upload('cv_file','teams');
              }
              Team::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('teams'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $teams =  Team::find($id);
                return view('admin.teams.show',['title'=>trans('admin.show'),'teams'=>$teams]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $teams =  Team::find($id);
                return view('admin.teams.edit',['title'=>trans('admin.edit'),'teams'=>$teams]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
             $data = $this->validate(request(),$rules,[],[
             'career_id'=>trans('admin.career_id'),
             'user_id'=>trans('admin.user_id'),
             'career_type'=>trans('admin.career_type'),
             'rate_range_monthly_from'=>trans('admin.rate_range_monthly_from'),
             'rate_range_monthly_to'=>trans('admin.rate_range_monthly_to'),
             'rate_range_hourly_from'=>trans('admin.rate_range_hourly_from'),
             'rate_range_hourly_to'=>trans('admin.rate_range_hourly_to'),
             'cv_file'=>trans('admin.cv_file'),
                   ]);
               if(request()->hasFile('cv_file')){
              it()->delete(Team::find($id)->cv_file);
              $data['cv_file'] = it()->upload('cv_file','teams');
               }
              Team::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('teams'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $teams = Team::find($data);
 
                    	it()->delete($teams->cv_file);
                    	it()->delete('team',$data);

                    @$teams->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}