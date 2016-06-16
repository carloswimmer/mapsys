<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Submap;
use App\Switchmodel;

class Host extends Model
{
    //

	protected $fillable = ['submap', 'elementid', 'name', 'switchmodel'];

	public function submap() {
		return $this->belongsTo(Submap::class);
	}

	public function switchmodel() {
		return $this->belongsTo(Switchmodel::class);	
	}
}
