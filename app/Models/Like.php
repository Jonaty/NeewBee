<?php 

namespace NeewBee\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $table = "like";

	public function like()
	{
		return $this->morphTo();
	}

	public function usuario()
	{
		return $this->belongsTo('NeewBee\Models\User', 'usuario_id');
	}
}


 ?>