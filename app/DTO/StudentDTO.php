<?php

namespace App\DTO;

class StudentDTO extends PersonaDTO
{
    public function __construct(
        string $name,
        string $lastname,
        string $cedula,
        int $age,
        string $gender,
        public string $grade,
        public int $n_subjects,
        public int $notes
    ) {
        parent::__construct($name, $lastname, $cedula, $age, $gender);
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'grade' => $this->grade,
            'n_subjects' => $this->n_subjects,
            'notes' => $this->notes,
        ]);
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['lastname'],
            $data['cedula'],
            $data['age'],
            $data['gender'],
            $data['grade'],
            $data['n_subjects'],
            $data['notes']
        );
    }
}