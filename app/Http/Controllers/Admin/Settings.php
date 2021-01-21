<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'sitename_ar'    => 'sometimes|nullable',
			'sitename_en'    => 'sometimes|nullable',
			'email'          => 'sometimes|nullable',
			'logo'           => 'sometimes|nullable|'.it()->image(),
			'icon'           => 'sometimes|nullable|'.it()->image(),
			'system_status'  => 'sometimes|nullable',
			'system_message' => 'sometimes|nullable',
		];
		$data = $this->validate(request(), $rules, [], [
				'sitename_ar'    => trans('admin.sitename_ar'),
				'sitename_en'    => trans('admin.sitename_en'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'system_message' => trans('admin.system_message'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = it()->upload('icon', 'setting');
		}
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));

	}

}