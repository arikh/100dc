# LB PHP Kata

## Getting started

You can use either local PHP & Composer or Docker 

### 1. Use local PHP and Composer

#### Requirements

1. PHP 7.3+
2. Composer

#### Install dependencies

```shell
composer install
```

#### Run test

```shell
composer test
```

### 2. Use Docker

#### Requirements

1. Docker

#### Install dependencies

```shell
./composer.sh install
```

#### Run test

```shell
./composer.sh test
```

## Special Price

This kata is about implementing the cart functionality similar to what we see at supermarket checkout:
- Customer takes multiple items to the checkout station
- Customer scans one item at a time (He/she can scan multiple items - same of different SKU - for the same cart)
- Customer can check the total amount he/she needs to pay any time after he/she scans an item

Here's the pricing rule we want to test

| Item | Unit Price | Special Price |
|------|------------|---------------|
|   A  |  50        | 3 for 130     |
|   B  |  30        | 2 for 45      |
|   C  |  20        |               |
|   D  |  15        |               |

Your task is to implement `\LoveBonito\Kata\SpecialPrice\Cart`
- constructor: accept a string as pricing rule (you need to define your own input format and data structure)
- function `scan`: accept a string as SKU of one item
- function `total`: return the total price of the cart

Take a look at `\LoveBonito\Kata\Test\SpecialPrice\CartTest`. Test cases are implemented. You need to ensure that all the tests are passed
- define your pricing rule as a string: test code uses `\LoveBonito\Kata\Test\SpecialPrice\CartTest::PRICING_RULES` to instantiate new `\LoveBonito\Kata\SpecialPrice\Cart` instance
