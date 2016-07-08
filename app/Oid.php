<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Port;

class Oid extends Model
{
    // Ports that belong to oid.
	protected $fillable = ['number'];

	public function ports() {
		return $this->belongsToMany(Port::class);
	}


}
