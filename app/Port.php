<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Oid;
use App\SwitchModel;
use App\PortPlusOid;

class Port extends Model
{
	protected $fillable = ['name'];

    // Oids that belong to port.
	//public function oids() {
	//	return $this->belongsToMany(Oid::class);
	//}

	// Switchs that belong to port.
	public function switchModels() {
		return $this->belongsToMany(SwitchModel::class);
	}

	public function portPlusOids() {
		return $this->hasMany(PortPlusOid::class);
	}
}
