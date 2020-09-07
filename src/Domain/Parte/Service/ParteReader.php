<?php

namespace App\Domain\Parte\Service;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Parte\Repository\ParteReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class ParteReader
{
    /**
     * @var ParteReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ParteReaderRepository $repository The repository
     */
    public function __construct(ParteReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Read a user by the given user id.
     *
     * @param int $parteId The user id
     *
     * @throws ValidationException
     *
     * @return ParteData The user data
     */
    public function getParteById(int $parteId): array
    {
        // Validation
        if (empty($parteId)) {
            throw new ValidationException('Parte ID required');
        }

        $parte = $this->repository->getById($parteId);
        return $parte;
    }
    
    public function getPartesByIdProfesor(int $profesorId) {
        $partes = $this->repository->getByIdProfesor($profesorId);
        return $partes;
    }




}
