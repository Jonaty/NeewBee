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

  public function scopeNotReply($query)
  {
  	return $this->whereNull('parent_id');
  }

  public function respuestas()
  {
  	return $this->hasMany('NeewBee\Models\Publicacion', 'parent_id');
  }

  public function likes()
  {
    return $this->morphMany('NeewBee\Models\Like', 'like');
  }
}

?>