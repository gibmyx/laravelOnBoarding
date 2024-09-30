<?php

namespace App\DTO;

abstract class PersonaDTO
{
    public function __construct(
        public string $name,
        public string $lastname,
        public string $cedula,
        public int $age,
        public string $gender
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'cedula' => $this->cedula,
            'age' => $this->age,
            'gender' => $this->gender,
        ];
    }
}