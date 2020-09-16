<?php
namespace App\Domain\Profesor\Data;

use App\Domain\Parte\Data\ParteData;
use Illuminate\Database\Eloquent\Model;
class ProfesorData extends Model { 
  /**
    * The table associated with the model.
    *
    * @var string
    */ 
  protected $table = 'profesores';

  /**
    * Get partes del profesor.
    */
    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }
}