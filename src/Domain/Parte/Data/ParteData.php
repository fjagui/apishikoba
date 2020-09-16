<?php
namespace App\Domain\Parte\Data;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;
class ParteData extends Model { 
  /**
    * The table associated with the model.
    *
    * @var string
    */ 
  protected $table = 'partes';

  /**
     * Get the profesor que puso el parte.
     */
    public function profesor()
    {             
              
             
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

  /**
     * Get Alumno al que se le puso el parte.
     */
    public function alumno()
    {
        return $this->belongsTo(AlumnoData::class,'idAlumno');
    }
}