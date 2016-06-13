<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Host;

class Submap extends Model
{
    //
	public function hosts() {
		return $this->hasMany(Host::class);	
	}
}
