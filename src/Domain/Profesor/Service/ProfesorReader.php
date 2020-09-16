<?php

namespace App\Domain\Profesor\Service;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Profesor\Repository\ProfesorReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class ProfesorReader
{
    /**
     * @var ProfesorReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ProfesorReaderRepository $repository The repository
     */
    public function __construct(ProfesorReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $userId The user id
     *
     * @throws ValidationException
     *
     * @return ProfesorData The user data
     */
    public function getProfesorDetails(int $profesorId): array
    {
        // Validation
        if (empty($profesorId)) {
            throw new ValidationException('Profesor ID required');
        }

        $profesor = $this->repository->getProfesorById($profesorId);
      
        return $profesor;
    }
    
    public function getProfesorByEmail(string $profesorEmail): array
    {
        // Validation
        if (empty($profesorEmail)) {
            throw new ValidationException('Profesor email required');
        }
        $profesor = $this->repository->getByEmail($profesorEmail);
        return (array) $profesor;
        
    }



    public function getAllProfesores() {
        $profesores = $this->repository->getAll();
        return $profesores;
    }

    


}
