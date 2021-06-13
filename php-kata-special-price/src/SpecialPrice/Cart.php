<?php

declare(strict_types=1);

namespace LoveBonito\Kata\SpecialPrice;

class Cart
{
    public function __construct(string $pricingRules)
    {
        // @todo        
        $pricingRulesArray = [];
        foreach(explode(",",$pricingRules) as $items){
            print $items;
            foreach(explode(":",$items) as $item=>$price){
                $pricingRulesArray[$item] = $price;
            }
        }
        print_r($pricingRulesArray);

    }

    public function scan(string $sku): void
    {
        // @todo
        //return the price

        return $priceRulesArray[$sku];
        

    }

    public function total(): int
    {
        // @todo
        return 0;
    }

}





