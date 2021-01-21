<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

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
class PagesApi extends Controller
{

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Display a listing of the resource. Api
             * @return \Illuminate\Http\Response
             */
            public function index()
            {
               return response()->json([
               "status"=>true,
               "data"=>Page::orderBy('id','desc')->paginate(15)
               ]);
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * Store a newly created resource in storage. Api
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
    public function store()
    {
        $rules = [
                         'pagedepartment_id'=>'required|numeric',
             'name'=>'required|string',
             'desc'=>'nullable|sometimes',
             'page_url'=>'required|url',
             'image'=>'required|'.it()->image().'',
             'content'=>'nullable|sometimes',
        ];
        $data = Validator::make(request()->all(),$rules,[],[
                         'pagedepartment_id'=>trans('admin.pagedepartment_id'),
             'name'=>trans('admin.name'),
             'desc'=>trans('admin.desc'),
             'page_url'=>trans('admin.page_url'),
             'image'=>trans('admin.image'),
             'content'=>trans('admin.content'),
        ]);
		
        if($data->fails()){
            return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
            ]); 
             }
        $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('image')){
              $data['image'] = it()->upload('image','pages');
              }
        $create = Page::create($data); 

        return response()->json([
            "status"=>true,
            "message"=>trans('admin.added'),
            "data"=>$create
        ]);
    }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $show =  Page::find($id);
                 return response()->json([
              "status"=>true,
              "data"=> $show
              ]);  ;
            }


            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function update($id)
            {
                $rules = [
             'pagedepartment_id'=>'required|numeric',
             'name'=>'required|string',
             'desc'=>'nullable|sometimes',
             'page_url'=>'required|url',
             'image'=>'required|'.it()->image().'',
             'content'=>'nullable|sometimes',

                         ];
             $data = Validator::make(request()->all(),$rules,[],[
             'pagedepartment_id'=>trans('admin.pagedepartment_id'),
             'name'=>trans('admin.name'),
             'desc'=>trans('admin.desc'),
             'page_url'=>trans('admin.page_url'),
             'image'=>trans('admin.image'),
             'content'=>trans('admin.content'),
                   ]);
             if($data->fails()){
             return response()->json([
               "status"=>false,"
               messages"=>$data->messages()
               ]); 
             }
             $data = request()->except(["_token"]);
              $data['user_id'] = auth()->user()->id; 
               if(request()->hasFile('image')){
              it()->delete(Page::find($id)->image);
              $data['image'] = it()->upload('image','pages');
               }
              Page::where('id',$id)->update($data);

              $Page = Page::find($id);

              return response()->json([
               "status"=>true,
               "message"=>trans('admin.updated'),
               "data"=> $Page
               ]);
            }

            /**
             * Baboon Script By [It V 1.2 | https://it.phpanonymous.com]
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
               return response(["status"=>true,"message"=>trans('admin.deleted')]);
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
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }else {
                    $pages = Page::find($data);
 
                    	it()->delete($pages->image);
                    	it()->delete('page',$data);

                    @$pages->delete();
                    return response(["status"=>true,"message"=>trans('admin.deleted')]);
                }
            }

            
}