<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CountriesDataTable;
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
class Countries extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CountriesDataTable $countries)
            {
               return $countries->render('admin.countries.index',['title'=>trans('admin.countries')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.countries.create',['title'=>trans('admin.create')]);
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
             'country_name'=>'required|string',
             'country_code'=>'required|string',
             'country_symbol'=>'required|string',
             'country_landmark_image'=>'required|'.it()->image().'',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'country_name'=>trans('admin.country_name'),
             'country_code'=>trans('admin.country_code'),
             'country_symbol'=>trans('admin.country_symbol'),
             'country_landmark_image'=>trans('admin.country_landmark_image'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('country_landmark_image')){
              $data['country_landmark_image'] = it()->upload('country_landmark_image','countries');
              }
              Country::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('countries'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $countries =  Country::find($id);
                return view('admin.countries.show',['title'=>trans('admin.show'),'countries'=>$countries]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $countries =  Country::find($id);
                return view('admin.countries.edit',['title'=>trans('admin.edit'),'countries'=>$countries]);
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
             'country_name'=>'required|string',
             'country_code'=>'required|string',
             'country_symbol'=>'required|string',
             'country_landmark_image'=>'required|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'country_name'=>trans('admin.country_name'),
             'country_code'=>trans('admin.country_code'),
             'country_symbol'=>trans('admin.country_symbol'),
             'country_landmark_image'=>trans('admin.country_landmark_image'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('country_landmark_image')){
              it()->delete(Country::find($id)->country_landmark_image);
              $data['country_landmark_image'] = it()->upload('country_landmark_image','countries');
               }
              Country::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('countries'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
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
               session()->flash('success',trans('admin.deleted'));
               return back();
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
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $countries = Country::find($data);
 
                    	it()->delete($countries->country_landmark_image);
                    	it()->delete('country',$data);

                    @$countries->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}