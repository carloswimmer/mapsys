<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Oid;
use App\SwitchModel;

class Port extends Model
{
    // Oids that belong to port.
	public function oids() {
		return $this->belongsToMany('Oid');
	}

	// Switchs that belong to port.
	public function switchModels() {
		return $this->belongsToMany('SwitchModel');
	}
}
