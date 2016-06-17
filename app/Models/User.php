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

  /* Eliminar Amigos */

  public function eliminarAmigo(User $user)
  {
    $this->amigoDe()->detach($user->id);
    $this->misAmigos()->detach($user->id);
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
     return (bool) $publicacion->likes->where('user_id', $this->id)->count();
  }

  /* Datos generales */

public function edad()
{
  if($this->edad)
  {
    return "{$this->edad}";
  }
}

public function est_civ()
{
  if($this->est_civ)
  {
    return "{$this->est_civ}";
  }
}

public function nacionalidad()
{
  if($this->nacionalidad)
  {
    return "{$this->nacionalidad}";
  }
}

public function direccion()
{
  if($this->direccion)
  {
    return "{$this->direccion}";
  }
}

public function email()
{
  if($this->email)
  {
    return "{$this->email}";
  }
}

public function telefono()
{
  if($this->telefono)
  {
    return "{$this->telefono}";
  }
}

public function tel_contacto()
{
  if($this->telefono)
  {
    return "{$this->tel_contacto}";
  }
}

/* Info academica */

public function niv_acad()
{
  if($this->niv_acad)
  {
    return "{$this->niv_acad}";
  }
}

public function carrera()
{
  if($this->carrera)
  {
    return "{$this->carrera}";
  }
}

public function ocupacion()
{
  if($this->ocupacion)
  {
    return "{$this->ocupacion}";
  }
}

public function nombre_ocup()
{
  if($this->nombre_ocup)
  {
    return "{$this->nombre_ocup}";
  }
}

/*Cursos*/

public function cursos()
{
  if($this->cursos)
  {
    return "{$this->cursos}";
  }
}

/* Certificaciones */

public function certificaciones()
{
  if($this->certificaciones)
  {
    return "{$this->certificaciones}";
  }
}

/* Idiomas */

public function idiomas()
{
  if($this->idiomas)
  {
    return "{$this->idiomas}";
  }
}

/*Aptitudes */

public function aptitudes()
{
  if($this->aptitudes)
  {
    return "{$this->aptitudes}";
  }
}

/* Info adicional */

public function info_adic()
{
  if($this->info_adic)
  {
    return "{$this->info_adic}";
  }
}

}