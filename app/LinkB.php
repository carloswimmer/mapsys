<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Host;
use App\PortPlusOid;
use App\LinkA;

class LinkB extends Model
{
	protected $fillable = ['host_id', 'port_plus_oid_id', 'link_a_id'];

    public function host() {
		return $this->belongsTo(Host::class);
	}

	public function portPlusOid() {
		return $this->belongsTo(PortPlusOid::class);
	}

	public function linkA() {
		return $this->belongsTo(LinkA::class);
	}

}
