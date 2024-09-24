<?php

namespace App\Models;

use App\Dto\SistemaEducativo\Estudiante\Estudiante as DTOEstudiante;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiante';

    protected $fillable = ['nombre', 'apellido', 'cedula', 'edad', 'genero', 'grado', 'cantidad_materia', 'nota'];


    public function fromDTO(DTOEstudiante $DTOestudiante): void {
        
            $this->nombre = $DTOestudiante->getNombre();
            $this->apellido = $DTOestudiante->getApellido();
            $this->cedula = $DTOestudiante->getCedula();
            $this->edad = $DTOestudiante->getEdad();
            $this->genero = $DTOestudiante->getGenero();
            $this->grado = $DTOestudiante->getGrado();
            $this->cantidad_materia = $DTOestudiante->getCantidadMateria();
            $this->nota = $DTOestudiante->getNota();
        } 
}