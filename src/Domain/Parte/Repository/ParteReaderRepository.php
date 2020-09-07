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
    $row = $this->connection->table('partes')->find($parteId);
    print_r($row);
 

    if(!$row) {
        throw new \DomainException(sprintf('Parte not found: %s', $parteId));
    }       

    return (array) $row;
    }
    
    public function getByIdProfesor(int $profesorId): array
    {
        $rows = $this->connection->table('partes')->where('idProfesor','=',$profesorId)->get()->toArray();
        return  $rows;
    }

}