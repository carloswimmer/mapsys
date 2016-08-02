<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;
use App\Oid;
use App\SwitchModel;

class PortPlusOid extends Model
{
	protected $fillable = ['port_id', 'oid_id'];
	
	public function port() {
		return $this->belongsTo(Port::class);
	}

	public function oid() {
		return $this->belongsTo(Oid::class);
	}

	public function switchModels() {
		return $this->belongsToMany(SwitchModel::class);
	}
}
