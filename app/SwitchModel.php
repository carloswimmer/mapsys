<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortPlusOid;

class SwitchModel extends Model
{
	protected $fillable = ['name'];

    // Combination of ports and oids that belong to switch model
	public function portPlusOids() {
		return $this->belongsToMany(PortPlusOid::class);
	}
}
