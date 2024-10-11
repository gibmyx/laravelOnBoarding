<?php
/*
implementaremos una función que cuenta los caracteres en una cadena, excluyendo los espacios.
*/

namespace Tests\Unit;

use Tests\TestCase;

class CountCharTest extends TestCase
{
    public function test_count_char()
    {
        $comprobar = $this->countChar("hola");

        $this->assertSame(4, $comprobar);
    }

    public function test_count_char_space()
    {
        $comprobar = $this->countChar("arma de cadencia");

        $this->assertSame(14, $comprobar);
    }

    private function countChar(string $string): string
    {
        $string = str_replace(" ", "", $string);
        $resultado = strlen($string);

        return $resultado;
    }
}
