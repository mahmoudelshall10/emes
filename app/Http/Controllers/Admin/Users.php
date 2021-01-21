<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Notifications\SignupActivate;
use Validator;
use Set;
use Up;
use Form;
use Illuminate\Support\Str;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Users extends Controller
{

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(UsersDataTable $users)
            {
               return $users->render('admin.users.index',['title'=>trans('admin.users')]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
               return view('admin.users.create',['title'=>trans('admin.create')]);
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
             'name' => 'required|string', 
             'first_name' => 'required|string', 
             'last_name' => 'required|string', 
             'email' => 'required|string|email|unique:users',
             'password' => 'required|string|confirmed',
             'date_of_birth'=>'required|date|date_format:Y-m-d',
             'nationality'=>'required|string',
             'country_of_residence'=>'required|string',
             'company_name'=>'nullable|sometimes|string',
             'mobile_number'=>'nullable|sometimes|string',
             'phone_number'=>'nullable|sometimes|string',
             'position'=>'nullable|sometimes|string',
             'profile_image'=>'nullable|sometimes|'.it()->image().'',
                   ];
              
              $data = $this->validate(request(),$rules,[],[
             'name'=>trans('admin.name'),
             'first_name'=>trans('admin.first_name'),
             'last_name'=>trans('admin.last_name'),
             'email'=>trans('admin.email'),
             'password'=>trans('admin.password'),
             'date_of_birth'=>trans('admin.date_of_birth'),
             'company_name'=>trans('admin.company_name'),
             'nationality'=>trans('admin.nationality'),
             'country_of_residence'=>trans('admin.country_of_residence'),
             'mobile_number'=>trans('admin.mobile_number'),
             'phone_number'=>trans('admin.phone_number'),
             'position'=>trans('admin.position'),
             'profile_image'=>trans('admin.profile_image'),

              ]);
              $data['activation_token'] = Str::random(60);
              $data['name'] = request('first_name') .' '. request('last_name') ;
              if(request()->hasFile('profile_image')){
                $data['profile_image'] = it()->upload('profile_image','users');
                }
              $users =  User::create($data); 
              $users->notify(new SignupActivate($users));

              session()->flash('success',trans('admin.added'));
              return redirect(aurl('users'));
            }

            /**
             * Display the specified resource.
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
                $users =  User::find($id);
                return view('admin.users.show',['title'=>trans('admin.show'),'users'=>$users]);
            }


            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
                $users =  User::find($id);
                return view('admin.users.edit',['title'=>trans('admin.edit'),'users'=>$users]);
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
                'name' => 'required|string', 
                'email' => 'required|string|email',
                'password' => 'required|string|confirmed',
                'first_name'=>'required|string',
                'last_name'=>'required|string',
                'date_of_birth'=>'required|date|date_format:Y-m-d',
                'nationality'=>'required|string',
                'country_of_residence'=>'required|string',
                'company_name'=>'nullable|sometimes|string',
                'mobile_number'=>'nullable|sometimes|string',
                'phone_number'=>'nullable|sometimes|string',
                'position'=>'nullable|sometimes|string',
                'profile_image'=>'nullable|sometimes|'.it()->image().'',

                         ];
             $data = $this->validate(request(),$rules,[],[
                'name'=>trans('admin.name'),
                'email'=>trans('admin.email'),
                'password'=>trans('admin.password'),
                'first_name'=>trans('admin.first_name'),
                'last_name'=>trans('admin.last_name'),
                'date_of_birth'=>trans('admin.date_of_birth'),
                'company_name'=>trans('admin.company_name'),
                'nationality'=>trans('admin.nationality'),
                'country_of_residence'=>trans('admin.country_of_residence'),
                'mobile_number'=>trans('admin.mobile_number'),
                'phone_number'=>trans('admin.phone_number'),
                'position'=>trans('admin.position'),
                'account_status'=>trans('admin.account_status'),
                'profile_image'=>trans('admin.profile_image'),
                   ]);
              $data['name'] = request('first_name') .' '. request('last_name') ;
              User::where('id',$id)->update($data);

              session()->flash('success',trans('admin.updated'));
              return redirect(aurl('users'));
            }

            /**
             * Baboon Script By [It V 1.0 | https://it.phpanonymous.com]
             * destroy a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $r
             * @return \Illuminate\Http\Response
             */
            public function destroy($id)
            {
               $users = User::find($id);
               it()->delete($users->profile_image);
               @$users->delete();
               session()->flash('success',trans('admin.deleted'));
               return back();
            }



 			public function multi_delete(Request $r)
            {
                $data = $r->input('selected_data');
                if(is_array($data)){
                    foreach($data as $id)
                    {
                    	$users = User::find($id);
                        it()->delete($users->profile_image);
                    	@$users->delete();
                    }
                    session()->flash('success', trans('admin.deleted'));
                   return back();
                }else {
                    $users = User::find($data);
                    it()->delete($users->profile_image);
                    @$users->delete();
                    session()->flash('success', trans('admin.deleted'));
                    return back();
                }
            }

            public function signupActivate($token)
            {
                $users = User::where('activation_token', $token)->first();
                if (!$users) {
                    return response()->json([
                        'message' => 'This activation token is invalid.'
                    ], 404);
                }
                $users->account_status = true;
                $users->activation_token = '';
                $users->save();
                return redirect(aurl('users'));
            }

            
}