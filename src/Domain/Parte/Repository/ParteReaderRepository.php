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

    /* Devuelve parte por Id
     */
    public function getById(int $parteId): array    
    {
       
     //$row = $this->connection->table('partes')->find($parteId);

     
    $row = ParteData::find($parteId)->toArray();
    $row['idProfesor'] = ParteData::find($parteId)->profesor->toArray();
    /*// raw se utiliza para escribir funciones dentro de las consultas.
    $rows = $this->connection->table('partes')
        ->select('partes.*',
             'profesores.apellido1 as Apellido1Profesor',
             'profesores.apellido2 as Apellido2Profesor',
             'profesores.nombre as NombreProfesor',
             'alumno.apellido1 as Apellido1Alumno',
             'alumno.apellido2 as Apellido2Alumno',
             'alumno.nombre as NombreAlumno')
        ->join('profesores','partes.idProfesor',"=",'profesores.id')
        ->join('alumno','partes.idAlumno',"=",'alumno.id')
        ->where('partes.id','=', $parteId)->get();*/
    if(!$row) {
        throw new \DomainException(sprintf('Parte not found: %s', $parteId));
    }       

    return (array) $row;
    }

    /**
     * Partes puestos por un profesor.
     *
     * @param int $profesorID The user
     *
     * @return array array con los partes puestos por el profesor.
     */
    public function getByIdProfesor(int $profesorId): array
    {
        //Cargamos los partes del profesor
        $partes = ParteData::where('idProfesor','=',$profesorId)->get()->toArray();
        //Array para devolver que incluirá los datos del  alumno 
        $resultado= [];
        //Recorremos los partes y cargamos datos del alumno.
        foreach ($partes as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=ParteData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }

}