<?php 

namespace NeewBee\Models;

use NeewBee\Models\Publicacion;
use NeewBee\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
	use Authenticatable;

	protected $table = 'users';

	protected $fillable = ['nombre', 'apellidos', 'email', 'password', 'fec_nac', 'edad', 'nacionalidad', 'est_civ', 'direccion', 'telefono', 'tel_contacto', 'niv_acad', 'carrera', 'ocupacion', 'nombre_ocup', 'exp_lab', 'form_acad', 'cursos', 'certificaciones', 'idiomas', 'aptitudes', 'info_adic'];

	protected $hidden = ['password', 'remember_token'];

	/* Obtener Nombre */

    public function nombre()
  {
	if($this->nombre && $this->apellidos)
	{
		return "{$this->nombre} {$this->apellidos}";
	}
  }


/* Foto de perfil */

   public function avatarUrl()
 {
 	return "https://www.gravatar.com/avatar/{{ md5($this->email)}}?d=mm&s=40";
 }

 public function publicaciones()
 {
  return $this->hasMany('NeewBee\Models\Publicacion', 'usuario_id');
 }

 public function likes()
 {
  return $this->hasMany('NeewBee\Models\Like', 'usuario_id');
 }

 /* Relacion de amigos */

 public function misAmigos()
 {
 	return $this->belongsToMany('NeewBee\Models\User', 'amigos', 'usuario_id','amigo_id' );
 }

 public function amigoDe()
 {
 	return $this->belongsToMany('NeewBee\Models\User', 'amigos', 'amigo_id', 'usuario_id');
 }

 public function amigos()
 {
 	return $this->misAmigos()->wherePivot('aceptacion', true)->get()->merge($this->amigoDe()->wherePivot('aceptacion', true)->get());
 }


/*Solicitudes de Amistad */

  public function solicitudesAmigos()
  {
  	return $this->misAmigos()->wherePivot('aceptacion', false)->get();
  }

  public function solicitudesAmigosPendientes()
  {
  	return $this->amigoDe()->wherePivot('aceptacion', false)->get();
  }

  public function tenerSolicitudesAmigosPendientes(User $user)
  {
  	return (bool) $this->solicitudesAmigosPendientes()->where('id', $user->id)->count();
  }

  public function tenerSolicitudesAmigosRecibidas(User $user)
  {
  	return (bool) $this->solicitudesAmigos()->where('id', $user->id)->count();
  }

  public function agregarAmigos(User $user)
  {
  	$this->amigoDe()->attach($user->id);
  }

  public function aceptarSolicitudAmigos(User $user)
  { 

  $this->solicitudesAmigos()->where('id', $user->id)->first()->pivot->update(['aceptacion' => true, ]);
  }

  public function tieneAmigosCon(User $user)
  {
  	return (bool) $this->amigos()->where('id', $user->id)->count();
  }

  public function tenerMeGusta(Publicacion $publicacion)
  {
     return (bool) $publicacion->likes->where('like_id', $publicacion->id)->where('like_type', get_class($publicacion))->where('usuario_id', $this->id)->count();
  }

}