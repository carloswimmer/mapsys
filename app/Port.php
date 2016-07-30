<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PortPlusOid;

class Port extends Model
{
	protected $fillable = ['name'];

	public function portPlusOids() {
		return $this->hasMany(PortPlusOid::class);
	}
}
