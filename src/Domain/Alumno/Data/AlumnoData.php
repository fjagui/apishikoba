<?php
namespace App\Domain\Alumno\Data;

use App\Domain\Parte\Data\ParteData;
use Illuminate\Database\Eloquent\Model;
class AlumnoData extends Model { 
  /**
    * The table associated with the model.
    *
    * @var string
    */ 
  protected $table = 'alumno';

  /**
    * Get partes del profesor.
    */
    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }
}