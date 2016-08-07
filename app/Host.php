<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SwitchModel;
use App\Submap;
use App\LinkA;
use App\LinkB;

class Host extends Model
{
    protected $fillable = ['submap_id', 'switch-model_id', 'elementid', 'name'];

	public function switchModel() {
		return $this->belongsTo(SwitchModel::class);
	}

	public function submap() {
		return $this->belongsTo(Submap::class);
	}

	public function linkA() {
		return $this->hasMany(LinkA::class);
	}

	public function linkB() {
		return $this->hasMany(LinkB::class);
	}
}
