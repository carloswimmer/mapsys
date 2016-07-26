<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;
use App\PortPlusOid;

class Oid extends Model
{
    // Ports that belong to oid.
	protected $fillable = ['number'];

	//public function ports() {
	//	return $this->belongsToMany(Port::class)->withPivot('number');
	//}

	public function portPlusOids() {
		return $this->hasMany(PortPlusOid::class);
	}
}
