<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ServeinsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Servein;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Serveins extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ServeinsDataTable $serveins)
            {
               return $serveins->render('admin.serveins.index',['title'=>trans('admin.serveins')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.serveins.create',['title'=>trans('admin.create')]);
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
             'country_id'=>'required|numeric',
             'company_address'=>'required|string',
             'longitude'=>'required|numeric',
             'latitude'=>'required|numeric',
             'company_phone'=>'required|numeric',
             'company_email'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'country_id'=>trans('admin.country_id'),
             'company_address'=>trans('admin.company_address'),
             'longitude'=>trans('admin.longitude'),
             'latitude'=>trans('admin.latitude'),
             'company_phone'=>trans('admin.company_phone'),
             'company_email'=>trans('admin.company_email'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Servein::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('serveins'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $serveins =  Servein::find($id);
                return view('admin.serveins.show',['title'=>trans('admin.show'),'serveins'=>$serveins]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $serveins =  Servein::find($id);
                return view('admin.serveins.edit',['title'=>trans('admin.edit'),'serveins'=>$serveins]);
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
             'country_id'=>'required|numeric',
             'company_address'=>'required|string',
             'longitude'=>'required|numeric',
             'latitude'=>'required|numeric',
             'company_phone'=>'required|numeric',
             'company_email'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'country_id'=>trans('admin.country_id'),
             'company_address'=>trans('admin.company_address'),
             'longitude'=>trans('admin.longitude'),
             'latitude'=>trans('admin.latitude'),
             'company_phone'=>trans('admin.company_phone'),
             'company_email'=>trans('admin.company_email'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Servein::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('serveins'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $serveins = Servein::find($id);


               @$serveins->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$serveins = Servein::find($id);

                    	@$serveins->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $serveins = Servein::find($data);
 

                    @$serveins->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}