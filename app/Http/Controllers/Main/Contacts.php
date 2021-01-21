<?php
namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Model\Contact;

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


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('/servein');
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

              session()->flash('success',trans('main.your_feedback_has_been_sent'));
              return redirect()->back();
            }


            
}