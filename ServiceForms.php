<?php
namespace ;
use App\Http\Controllers\Controller;
use App\DataTables\ServiceFormsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\ServiceForm;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ServiceForms extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ServiceFormsDataTable $serviceforms)
            {
               return $serviceforms->render('admin.serviceforms.index',['title'=>trans('admin.serviceforms')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.serviceforms.create',['title'=>trans('admin.create')]);
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
             'user_id'=>'required|numeric',
             'project_location|'=>'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'user_id'=>trans('admin.user_id'),
             'project_location|'=>trans('admin.project_location|'),

              ]);
		
              ServiceForm::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('serviceforms'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $serviceforms =  ServiceForm::find($id);
                return view('admin.serviceforms.show',['title'=>trans('admin.show'),'serviceforms'=>$serviceforms]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $serviceforms =  ServiceForm::find($id);
                return view('admin.serviceforms.edit',['title'=>trans('admin.edit'),'serviceforms'=>$serviceforms]);
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
             'user_id'=>'required|numeric',
             'project_location|'=>'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'user_id'=>trans('admin.user_id'),
             'project_location|'=>trans('admin.project_location|'),
                   ]);
              ServiceForm::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('serviceforms'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $serviceforms = ServiceForm::find($id);


               @$serviceforms->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$serviceforms = ServiceForm::find($id);

                    	@$serviceforms->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $serviceforms = ServiceForm::find($data);
 

                    @$serviceforms->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}