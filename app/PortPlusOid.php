<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;
use App\Oid;
use App\SwitchModel;
use App\LinkA;
use App\LinkB;

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

	public function linkAs() {
		return $this->hasMany(LinkA::class);
	}

	public function linkBs() {
		return $this->hasMany(LinkB::class);
	}

}
