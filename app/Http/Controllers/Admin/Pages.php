<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\PagesDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\Page;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Pages extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(PagesDataTable $pages)
            {
               return $pages->render('admin.pages.index',['title'=>trans('admin.pages')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.pages.create',['title'=>trans('admin.create')]);
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
             'page_id'=>'nullable|sometimes|numeric',
             'name'=>'required|string',
             'desc'=>'nullable|sometimes',
             'page_url'=>'nullable|sometimes',
             'image'=>'nullable|sometimes|'.it()->image().'',
             'content'=>'nullable|sometimes',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'page_id'=>trans('admin.page_id'),
             'name'=>trans('admin.name'),
             'desc'=>trans('admin.desc'),
             'page_url'=>trans('admin.page_url'),
             'image'=>trans('admin.image'),
             'content'=>trans('admin.content'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','pages');
              }
              Page::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('pages'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $pages =  Page::find($id);
                return view('admin.pages.show',['title'=>trans('admin.show'),'pages'=>$pages]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $pages =  Page::find($id);
                return view('admin.pages.edit',['title'=>trans('admin.edit'),'pages'=>$pages]);
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
             'page_id'=>'nullable|sometimes|numeric',
             'name'=>'required|string',
             'desc'=>'nullable|sometimes',
             'page_url'=>'nullable|sometimes',
             'image'=>'nullable|sometimes|'.it()->image().'',
             'content'=>'nullable|sometimes',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'page_id'=>trans('admin.page_id'),
             'name'=>trans('admin.name'),
             'desc'=>trans('admin.desc'),
             'page_url'=>trans('admin.page_url'),
             'image'=>trans('admin.image'),
             'content'=>trans('admin.content'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
               if(request()->hasFile('image')){
              it()->delete(Page::find($id)->image);
              $data['image'] = it()->upload('image','pages');
               }
              Page::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('pages'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $pages = Page::find($id);

               it()->delete($pages->image);
               it()->delete('page',$id);

               @$pages->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$pages = Page::find($id);

                    	it()->delete($pages->image);
                    	it()->delete('page',$id);
                    	@$pages->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $pages = Page::find($data);
 
                    	it()->delete($pages->image);
                    	it()->delete('page',$data);

                    @$pages->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}