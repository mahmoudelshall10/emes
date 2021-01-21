<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\DownloadFilesDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Model\DownloadFile;
use Validator;
use Set;
use Up;
use Form;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class DownloadFiles extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(DownloadFilesDataTable $downloadfiles)
            {
               return $downloadfiles->render('admin.downloadfiles.index',['title'=>trans('admin.downloadfiles')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.downloadfiles.create',['title'=>trans('admin.create')]);
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
             'link'=>'required|url',

                   ];
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'link'=>trans('admin.link'),

              ]);
		
              $data['admin_id'] = admin()->user()->id; 
              DownloadFile::create($data); 

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('downloadfiles'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $downloadfiles =  DownloadFile::find($id);
                return view('admin.downloadfiles.show',['title'=>trans('admin.show'),'downloadfiles'=>$downloadfiles]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $downloadfiles =  DownloadFile::find($id);
                return view('admin.downloadfiles.edit',['title'=>trans('admin.edit'),'downloadfiles'=>$downloadfiles]);
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
             'link'=>'required|url',

                         ];
             $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'link'=>trans('admin.link'),
                   ]);
              $data['admin_id'] = admin()->user()->id; 
              DownloadFile::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('downloadfiles'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $downloadfiles = DownloadFile::find($id);


               @$downloadfiles->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$downloadfiles = DownloadFile::find($id);

                    	@$downloadfiles->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $downloadfiles = DownloadFile::find($data);
 

                    @$downloadfiles->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            
}