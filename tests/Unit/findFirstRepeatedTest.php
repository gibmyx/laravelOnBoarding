<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;

class findFirstRepeatedTest extends TestCase
{

    public function test_find_first_repeated_1()
    {
        $array = [2, 1, 3, 5, 3, 2];
        $this->assertEquals(3, $this->findFirstRepeated($array));
    }

    public function test_find_first_repeated_2()
    {
        $array = [2, 3, 4, 5];
        $this->assertEquals(-1, $this->findFirstRepeated($array));
    }

    public function test_find_first_repeated_3()
    {
        $array = [5, 1, 5, 1];
        $this->assertEquals(5, $this->findFirstRepeated($array));
    }

    private function findFirstRepeated(array $gifts): int
    {
        $values = [];

        foreach ($gifts as $gift) {
            if (in_array($gift, $values))
                return $gift;

            $values[] = $gift;
        }

        return -1;
    }
}