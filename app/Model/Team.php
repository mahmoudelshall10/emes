<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Team extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'teams';
protected $fillable = [
		'id',
		'admin_id',
		              'career_id',
        'user_id',
'career_id',

'user_id',

'career_type',

'rate_range_monthly_from',
'rate_range_monthly_to',
'rate_range_hourly_from',
'rate_range_hourly_to',
'cv_file',
		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function career_id(){
      return $this->hasOne(\App\Model\Career::class,'id','career_id');
   }

   public function user_id(){
      return $this->hasOne(\App\User::class,'id','user_id');
   }

}
