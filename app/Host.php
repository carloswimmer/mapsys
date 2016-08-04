<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SwitchModel;
use App\Submap;

class Host extends Model
{
    protected $fillable = ['submap_id', 'switch-model_id', 'elementid', 'name'];

	public function switchModel() {
		return $this->belongsTo(SwitchModel::class);
	}

	public function submap() {
		return $this->belongsTo(Submap::class);
	}
}
