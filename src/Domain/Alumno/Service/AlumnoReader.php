<?php

namespace App\Domain\Alumno\Service;

use App\Domain\Alumno\Data\AlumnoData;
use App\Domain\Alumno\Repository\AlumnoReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class AlumnoReader
{
    /**
     * @var AlumnoReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param AlumnoReaderRepository $repository The repository
     */
    public function __construct(AlumnoReaderRepository $repository)
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
    public function getAlumnoDetails(int $alumnoId): array
    {
        // Validation
        if (empty($alumnoId)) {
            throw new ValidationException('Alumno ID required');
        }

        $alumno = $this->repository->getAlumnoById($alumnoId);
        return $alumno;
    }
    public function getAllAlumnos() {
        $alumnos = $this->repository->getAll();
        return $alumnos;
    }




}
