<?php

namespace App\Domain\Profesor\Repository;

use App\Domain\Profesor\Data\ProfesorData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ProfesorReaderRepository
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
    public function getProfesorById(int $profesorId): array
{
    $row = $this->connection->table('profesores')->find($profesorId);
    print_r($row);
    
    if(!$row) {
        throw new \DomainException(sprintf('Profesor not found: %s', $profesorId));
    }       

    return (array) $row;
}
    public function getAll()
    {
        $rows = $this->connection->table('profesores')->get();
        
        return $rows;
    }

}