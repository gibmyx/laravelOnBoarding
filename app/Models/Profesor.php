<?php

namespace App\Models;

use App\Dto\SistemaEducativo\Profesor\Profesor as DTOProfesor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesor';

    protected $fillable = ['nombre', 'apellido', 'cedula', 'edad', 'genero', 'titulo_universitario', 'materia_asignada', 'horas_asignadas'];


    public function fromDTO(DTOProfesor $DTOestudiante): void {
            $this->nombre = $DTOestudiante->getNombre();
            $this->apellido = $DTOestudiante->getApellido();
            $this->cedula = $DTOestudiante->getCedula();
            $this->edad = $DTOestudiante->getEdad();
            $this->genero = $DTOestudiante->getGenero();
            $this->titulo_universitario = $DTOestudiante->getTituloUniversitario();
            $this->materia_asignada = $DTOestudiante->getMateriaAsignada();
            $this->horas_asignadas = $DTOestudiante->getHorasAsignadas();
        } 

}
