<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\CardsDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Card;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Cards extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(CardsDataTable $cards)
            {
               return $cards->render('admin.cards.index',['title'=>trans('admin.cards')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.cards.create',['title'=>trans('admin.create')]);
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
             'icon'=>'required|string',
             'content'=>'required',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'icon'=>trans('admin.icon'),
             'content'=>trans('admin.content'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              Card::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('cards'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $cards =  Card::find($id);
                return view('admin.cards.show',['title'=>trans('admin.show'),'cards'=>$cards]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $cards =  Card::find($id);
                return view('admin.cards.edit',['title'=>trans('admin.edit'),'cards'=>$cards]);
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
             'icon'=>'required|string',
             'content'=>'required',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'icon'=>trans('admin.icon'),
             'content'=>trans('admin.content'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              Card::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('cards'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $cards = Card::find($id);


               @$cards->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$cards = Card::find($id);

                    	@$cards->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $cards = Card::find($data);
 

                    @$cards->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}