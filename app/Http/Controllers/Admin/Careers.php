<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CareersDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Career;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Careers extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CareersDataTable $careers)
            {
               return $careers->render('admin.careers.index',['title'=>trans('admin.careers')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.careers.create',['title'=>trans('admin.create')]);
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
             'career_name'=>'required|string',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'career_name'=>trans('admin.career_name'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Career::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('careers'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $careers =  Career::find($id);
                return view('admin.careers.show',['title'=>trans('admin.show'),'careers'=>$careers]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $careers =  Career::find($id);
                return view('admin.careers.edit',['title'=>trans('admin.edit'),'careers'=>$careers]);
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
             'career_name'=>'required|string',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'career_name'=>trans('admin.career_name'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Career::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('careers'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $careers = Career::find($id);


               @$careers->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$careers = Career::find($id);

                    	@$careers->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $careers = Career::find($data);
 

                    @$careers->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}