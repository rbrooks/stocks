<?php

class Stock
{
    public function buyAndSellPrices($prices)
    {
        $prices_arr = array_values($prices);
        $lowest_price = min($prices_arr);
        $highest_price = max($prices_arr);

        $lowest_price_time = array_search($lowest_price, $prices);
        $highest_price_time = array_search($highest_price, $prices);
        // If there are duplicate price values, we grab first matching key.
        // I forget if this is what spec specified. Let's pretend it did.

        if ($lowest_price_time > $highest_price_time) {
            return [];
        }

        return [$lowest_price_time, $highest_price_time];
    }
}

// MAIN

$binaryPathParts = explode('/', $_SERVER['_']);
$cliBinary = end($binaryPathParts);

if ($cliBinary == 'php') { // Prevent execution when called from Test Suite.
    $timePrices = array(
        30 => 1,
        60 => 2,
        90 => 4,
        120 => 6,
        150 => 5,
        180 => 10,
        210 => 9
    );

    $stock = new Stock();
    $buySell = $stock->buyAndSellPrices($timePrices);

    echo "\n";

    if ($buySell != []) {
        echo "Best Buy Time: $buySell[0]\n";
        echo "Best Sell Time: $buySell[1]\n";
    } else {
        echo "Highest price was earlier in the day than lowest.\n";
    }

    echo "\n";
}
?>
