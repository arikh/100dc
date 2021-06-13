<?php

declare(strict_types=1);

namespace LoveBonito\Kata\Test\SpecialPrice;

use LoveBonito\Kata\SpecialPrice\Cart;
use PHPUnit\Framework\TestCase;

/**
 * @covers \LoveBonito\Kata\SpecialPrice\Cart
 */
class CartTest extends TestCase
{
    /**
     * Define your own pricing rule format with the following data
     *
     * Item   Unit      Special
     *        Price     Price
     * --------------------------
     *   A     50       3 for 130
     *   B     30       2 for 45
     *   C     20
     *   D     15
     */
    
    public const PRICING_RULES = "A:50,B:30,C:20,D:15,3A:130,2B:45";
    

    /**
     * @test
     * @dataProvider provideValidItemAndTotal
     *
     * @param string $items
     * @param int $total
     */
    public function produceValidTotals(string $items, int $total): void
    {
        self::assertEquals($total, $this->price($items));
    }

    public function provideValidItemAndTotal(): array
    {
        return [
            ["", 0],
            ["A", 50],
            ["AB", 80],
            ["CDBA", 115],

            ["AA", 100],
            ["AAA", 130],
            ["AAAA", 180],
            ["AAAAA", 230],
            ["AAAAAA", 260],

            ["AAAB", 160],
            ["AAABB", 175],
            ["AAABBD", 190],
            ["DABABA", 190],
        ];
    }

    /**
     * @test
     */
    public function produceValidIncrementalTotal(): void
    {
        $cart = new Cart(self::PRICING_RULES);
        $cart->scan('A');
        self::assertEquals(50, $cart->total());
        $cart->scan('B');
        self::assertEquals(80, $cart->total());
        $cart->scan('A');
        self::assertEquals(130, $cart->total());
        $cart->scan('A');
        self::assertEquals(160, $cart->total());
        $cart->scan('B');
        self::assertEquals(175, $cart->total());
    }

    private function price(string $items): int
    {
        $cart = new Cart(self::PRICING_RULES);
        foreach (str_split($items) as $item) {
            $cart->scan($item);
        }

        return $cart->total();
    }
}
