<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;

class SwitchModel extends Model
{
	protected $fillable = ['name'];

    // Ports that belong to switch.
	public function ports() {
		return $this->belongsToMany('Port');
	}
}
