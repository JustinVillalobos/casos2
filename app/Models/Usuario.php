<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $idUsuario
 * @property string $usuario
 * @property string $contrasenia
 * @property string $autor
 * @property string|null $img
 * @property int $typeuser
 * 
 * @property Collection|Cuestionario[] $cuestionarios
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'idUsuario';
	public $timestamps = false;

	protected $casts = [
		'typeuser' => 'int'
	];

	protected $fillable = [
		'usuario',
		'contrasenia',
		'autor',
		'img',
		'typeuser'
	];

	public function cuestionarios()
	{
		return $this->hasMany(Cuestionario::class, 'autor');
	}
}
