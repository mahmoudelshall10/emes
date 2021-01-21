<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Servein extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'serveins';
protected $fillable = [
		'id',
		'admin_id',
		              'country_id',
'country_id',

'company_address',
'longitude',
'latitude',
'company_phone',
'company_email',
		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function country_id(){
      return $this->hasOne(\App\Model\Country::class,'id','country_id');
   }

}
