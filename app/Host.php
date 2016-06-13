<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Submap;

class Host extends Model
{
    // 
	protected $fillable = ['submap', 'elementid', 'name'];

	public function submap() {
		return $this->belongsTo(Submap::class);	
	}
}
