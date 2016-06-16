<?php 

namespace NeewBee\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
  protected $table = 'publicaciones';

  protected $fillable = ['publicacion'];

  public function usuario()
  {
  	return $this->belongsTo('NeewBee\Models\User', 'usuario_id');
  }
}

?>