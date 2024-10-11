<?php

/*
Implementa una función esPalindromo($str) que retorne true si la cadena es un palíndromo y 
false de lo contrario. Prueba con diferentes cadenas como "ana" y "hola".
*/

namespace Tests\Unit;

use Tests\TestCase;

class PalindromoTest extends TestCase
{
    public function test_palindromo_true()
    {
        $resultado = $this->esPalindromo('arenera');

        $this->assertSame(true, $resultado);
    }

    public function test_palindromo_false()
    {
        $resultado = $this->esPalindromo('cielo');

        $this->assertSame(false, $resultado);
    }

    public function esPalindromo(string $string): bool
    {
        $invertida = strrev($string);

        if($string == $invertida){
            return true;
        } else {
            return false;
        }
    }
}