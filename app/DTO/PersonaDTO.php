<?php

namespace App\DTO;

abstract class PersonaDTO
{
    public function __construct(
        public int $id,
        public string $name,
        public string $lastname,
        public int $cedula,
        public int $age,
        public string $gender
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'cedula' => $this->cedula,
            'age' => $this->age,
            'gender' => $this->gender,
        ];
    }
}
