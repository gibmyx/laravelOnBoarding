<?php
/*
En la fábrica de juguetes del Polo Norte, cada juguete tiene un número de identificación único.
Sin embargo, debido a un error en la máquina de juguetes, algunos números se han asignado a más
de un juguete.¡Encuentra el primer número de identificación que se ha repetido, donde la segunda
ocurrencia tenga el índice más pequeño! En otras palabras, si hay más de un número repetido, debes
devolver el número cuya segunda ocurrencia aparezca primero en la lista. Si no hay números repetidos,
devuelve -1.
*/

namespace Tests\Unit;

use Tests\TestCase;

class FactoryToyTest extends TestCase
{
    public function test_toy_equal()
    {
        $result = $this->first_repeated_character([2, 1, 3, 5, 3, 2]);

        $this->assertEquals(3, $result);
    }

    public function test_toy_none()
    {
        $result = $this->first_repeated_character([1, 2, 3, 4]);

        $this->assertEquals(-1, $result);
    }

    private function first_repeated_character(array $array): int
    {
        $repeat = [];

        foreach ($array as $value) {
            if (in_array($value, $repeat)) {
                return $value;
            }
            $repeat[] = $value;
        }

        return -1;
    }
}
