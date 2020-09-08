<?php

namespace App\Domain\Parte\Repository;

use App\Domain\Parte\Data\ParteData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ParteReaderRepository
{
    /**
     * @var Connection
     */
    private $connection;
    private $baseSQL;

    /**
     * The constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    // Add your custom query methods here...
    public function getById(int $parteId): array    
    {
       
     //$row = $this->connection->table('partes')->find($parteId);

     // raw se utiliza para escribir funciones dentro de las consultas.
    $row = $this->connection->table('partes')
        ->select('partes.*',
             'profesores.apellido1 as Apellido1Profesor',
             'profesores.apellido2 as Apellido2Profesor',
             'profesores.nombre as NombreProfesor',
             'alumno.apellido1 as Apellido1Alumno',
             'alumno.apellido2 as Apellido2Alumno',
             'alumno.nombre as NombreAlumno')
        ->join('profesores','partes.idProfesor',"=",'profesores.id')
        ->join('alumno','partes.idAlumno',"=",'alumno.id')
        ->where('partes.id','=', $parteId)->get();
    if(!$row) {
        throw new \DomainException(sprintf('Parte not found: %s', $parteId));
    }       

    return (array) $row;
    }
    
    public function getByIdProfesor(int $profesorId): array
    {
        $rows = $this->connection->table('partes')
        ->select('partes.*',
             'alumno.apellido1 as Apellido1Alumno',
             'alumno.apellido2 as Apellido2Alumno',
             'alumno.nombre as NombreAlumno')
        ->join('alumno','partes.idAlumno',"=",'alumno.id')
        ->where('partes.IdProfesor','=',$profesorId)->get()->toArray();
        return  $rows;
    }

}