<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Oid;
use App\SwitchModel;

class Port extends Model
{
	protected $fillable = ['name'];

    // Oids that belong to port.
	public function oids() {
		return $this->belongsToMany('Oid');
	}

	// Switchs that belong to port.
	public function switchModels() {
		return $this->belongsToMany('SwitchModel');
	}
}
