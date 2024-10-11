<?php
/*
Santa 🎅 está probando su nuevo trineo eléctrico, el CyberReindeer, en una carretera del Polo Norte. La carretera se representa con una cadena de caracteres, donde:

. = Carretera
S = Trineo de Santa
* = Barrera abierta
| = Barrera cerrada
Ejemplo de carretera: S...|....|.....

Cada unidad de tiempo, el trineo avanza una posición a la derecha. Si encuentra una barrera cerrada, se detiene hasta que la barrera se abra. Si está abierta, la atraviesa directamente.

Todas las barreras empiezan cerradas, pero después de 5 unidades de tiempo, se abren todas para siempre.

Crea una función que simule el movimiento del trineo durante un tiempo dado y devuelva un array de cadenas representando el estado de la carretera en cada unidad de tiempo:

const road = 'S..|...|..'
const time = 10 // unidades de tiempo
const result = cyberReindeer(road, time)

/* -> result:
[
  'S..|...|..', // estado inicial
  '.S.|...|..', // avanza el trineo la carretera
  '..S|...|..', // avanza el trineo la carretera
  '..S|...|..', // el trineo para en la barrera
  '..S|...|..', // el trineo para en la barrera
  '...S...*..', // se abre la barrera, el trineo avanza
  '...*S..*..', // avanza el trineo la carretera
  '...*.S.*..', // avanza el trineo la carretera
  '...*..S*..', // avanza el trineo la carretera
  '...*...S..', // avanza por la barrWera abierta
]

El resultado es un array donde cada elemento muestra la carretera en cada unidad de tiempo.

Ten en cuenta que si el trineo está en la misma posición que una barrera, entonces toma su lugar en el array.

Los elfos se inspiraron en este reto de Code Wars
*/

namespace Tests\Unit;

use Tests\TestCase;

class CyberReindeerTest extends TestCase
{
    public function test_cyber_reindeer()
    {
        $result = $this->cyberReindeer('S...|....|.....', 10);

        $this->assertSame([
            'S...|....|.....',
            '.S..|....|.....',
            '..S.|....|.....',
            '...S|....|.....',
            '...S|....|.....',
            '....S....*.....',
            '.....S...*.....',
            '......S..*.....',
            '.......S.*.....',
            '........S*.....',], $result);
    }

    private function cyberReindeer(string $road, int $time): array
    {
        $array = [];
        $contador = 0;

        for ($i=0; $i < $time; $i++) {

            $array[$i] = $road;

            if ($i >= 4) {
                $road = str_replace('|', '*', $road);
            }if ($road[$contador + 1] === '.' || $road[$contador + 1] === '*') {

                $road[$contador + 1] = $road[$contador];
                $road[$contador] = '.';
                $contador++;
            }
        }
        /*
        for ($i=0; $i < $time; $i++){

            $array = [$road];

            $pos = strpos('S', $road);

            $siguiente = substr($road, $pos + 1, 1);

            $anterior = substr($road, $pos -1, 1);

            if ($siguiente === '.') {
                $change = substr_replace($siguiente, 'S', 1);
                $road;
            }
        }
        */
        return $array;
    }
}
