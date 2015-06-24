<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Quote extends Model {

	use SoftDeletes;

	protected $table = 'quotes';		#table neme this model is referring to.
	protected $fillable = ['quote', 'author', 'image'];		# whitelist of columns that we can modify.
	protected $dates = ['deleted_at'];		# required to make use of the softdeletes trait.

}
