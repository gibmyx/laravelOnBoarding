<?php

namespace App\DTO;

class ProfessorDTO extends PersonaDTO
{
    public function __construct(
        string $name,
        string $lastname,
        string $cedula,
        int $age,
        string $gender,
        public string $u_degrees,
        public string $a_subjects,
        public int $hours_a
    )
    {
        parent::__construct($name, $lastname, $cedula, $age, $gender);
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'u_degrees' => $this->u_degrees,
            'a_subjects' => $this->a_subjects,
            'hours_a' => $this->hours_a,
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
            $data['u_degrees'],
            $data['a_subjects'],
            $data['hours_a']
        );
    }
}