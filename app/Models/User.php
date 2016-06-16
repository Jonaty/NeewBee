<?php 

namespace NeewBee\Models;

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



}