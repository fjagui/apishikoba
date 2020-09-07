<?php

namespace App\Domain\Alumno\Repository;

use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class AlumnoReaderRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * The constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    // Obtener alumno por id
    public function getAlumnoById(int $alumnoId): array
    {
    $row = $this->connection->table('alumnos')->find($alumnoId);
      if(!$row) {
        throw new \DomainException(sprintf('Profesor not found: %s', $alumnoId));
    }       
    return (array) $row;
    }

    public function getAll()
    {
        $rows = $this->connection->table('alumnos')->get();
        
        return $rows;
    }

}