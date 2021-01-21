<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ServiceForm extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'service_forms';
protected $fillable = [
		'id',
		'admin_id',
		'user_id',
		'project_location',
		'business_requirements',
		'other_country',
		'page_url',
		'additional_attachments',
		'linked_files',
		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function user_id(){
      return $this->hasOne(\App\User::class,'id','user_id');
   }

   public function project_location(){
      return $this->hasOne(\App\Model\Country::class,'id','project_location');
   }

}
