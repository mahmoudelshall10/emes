<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\ContactsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Contact;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Contacts extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(ContactsDataTable $contacts)
            {
               return $contacts->render('admin.contacts.index',['title'=>trans('admin.contacts')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.contacts.create',['title'=>trans('admin.create')]);
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
             'email'=>'required|string',
             'content'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'content'=>trans('admin.content'),

              ]);
		
              Contact::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('contacts'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $contacts =  Contact::find($id);
                return view('admin.contacts.show',['title'=>trans('admin.show'),'contacts'=>$contacts]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $contacts =  Contact::find($id);
                return view('admin.contacts.edit',['title'=>trans('admin.edit'),'contacts'=>$contacts]);
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
             'email'=>'required|string',
             'content'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'email'=>trans('admin.email'),
             'content'=>trans('admin.content'),
                   ]);
              Contact::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('contacts'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $contacts = Contact::find($id);


               @$contacts->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$contacts = Contact::find($id);

                    	@$contacts->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $contacts = Contact::find($data);
 

                    @$contacts->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}