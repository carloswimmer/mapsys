<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Host;
use App\PortPlusOid;
use App\LinkB;

class LinkA extends Model
{
    public function host() {
		return $this->belongsTo(Host::class);
	}

	public function portPlusOid() {
		return $this->belongsTo(PortPlusOid::class);
	}

	public function linkB() {
		return $this->hasOne(LinkB::class);
	}

}
