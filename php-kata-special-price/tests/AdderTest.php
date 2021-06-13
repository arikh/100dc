<?php

declare(strict_types=1);

namespace LoveBonito\Kata\Test;

use LoveBonito\Kata\Adder;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LoveBonito\Kata\Adder
 */
class AdderTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideValidInputAndSum
     *
     * @param $a
     * @param $b
     * @param $expected
     */
    public function fromValidInputCalculateValidSum($a, $b, $expected): void
    {
        self::assertEquals($expected, (new Adder())->add($a, $b));
    }

    public function provideValidInputAndSum(): array
    {
        return [
            'zero' => [
                'a' => 0,
                'b' => 0,
                'expected' => 0,
            ],

            'simple' => [
                'a' => 1,
                'b' => 1,
                'expected' => 2,
            ],
        ];
    }
}
