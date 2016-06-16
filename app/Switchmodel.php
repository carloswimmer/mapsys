<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Host;

class Switchmodel extends Model
{
    //
	public function hostsSwitchmodel() {
		return $this->hasMany(Host::class);	
	}
}
