<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;
use App\Oid;

class SwitchModel extends Model
{
	protected $fillable = ['name'];

    // Ports that belong to switch.
	public function ports() {
		return $this->belongsToMany(Port::class);
	}
}
