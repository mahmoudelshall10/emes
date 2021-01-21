<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\SocialsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Social;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Socials extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(SocialsDataTable $socials)
            {
               return $socials->render('admin.socials.index',['title'=>trans('admin.socials')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.socials.create',['title'=>trans('admin.create')]);
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
             'name'=>'required|string',
             'social_link'=>'required|url',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'social_link'=>trans('admin.social_link'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Social::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('socials'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $socials =  Social::find($id);
                return view('admin.socials.show',['title'=>trans('admin.show'),'socials'=>$socials]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $socials =  Social::find($id);
                return view('admin.socials.edit',['title'=>trans('admin.edit'),'socials'=>$socials]);
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
             'name'=>'required|string',
             'social_link'=>'required|url',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'social_link'=>trans('admin.social_link'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Social::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('socials'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $socials = Social::find($id);


               @$socials->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$socials = Social::find($id);

                    	@$socials->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $socials = Social::find($data);
 

                    @$socials->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}