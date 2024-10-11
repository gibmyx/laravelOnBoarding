<?php
/*
    Crea una función sumar($a, $b) que retorne la suma de $a y $b. 
    Escribe una prueba para verificar que sumar(2, 3) devuelve 5.
*/

namespace Tests\Unit;

use Tests\TestCase;

class SumTest extends TestCase
{
    public function test_sum()
    {
        $resultado = $this->sumar(2, 3);

        $this->assertSame(5, $resultado);
    }

    private function sumar(int $a, int $b): int
    {
        $suma = $a + $b;
        return $suma;
    }
}