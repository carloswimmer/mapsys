<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Host;

class Switchmodel extends Model
{
    //
	public function hosts() {
		return $this->hasMany(Host::class);	
	}
}
