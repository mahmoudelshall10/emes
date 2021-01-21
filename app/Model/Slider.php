<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Slider extends Model {
	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'sliders';
protected $fillable = [
		'id',
		'admin_id',
		      'title',
'image',
		'created_at',
		'updated_at',
		'deleted_at',
	];

}
