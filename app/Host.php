<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Submap;
use App\Switchmodel;

class Host extends Model
{
    //

	protected $fillable = ['submap_id', 'elementid', 'name', 'switch_model_id'];

	public function submap() {
		return $this->belongsTo(Submap::class);
	}

	public function switchModel() {
		return $this->belongsTo(SwitchModel::class);	
	}
}
