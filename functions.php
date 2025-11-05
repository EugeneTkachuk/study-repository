<?php
function myPad($n, $s = ' ')
{
$x = '';
for ($i = 0; $i < $n; $i++) {
$x = $x . $s;
}
return $x;
}

function getMaxLength($products, $l)
{
    $maxWeightLength = 0;
    foreach ($products as $value) {
        $length = strlen((string)($value[$l]));
        {
            if ($length > $maxWeightLength) {
                $maxWeightLength = $length;
            }
        }

    }
    return $maxWeightLength;
}

//$maxNameLength = getMaxLength($products, 'name') . "\n";
//echo $maxNameLength;
//$maxPriceLength = getMaxLength($products, 'price') . "\n";
//echo $maxPriceLength;
//$maxWeightLength = getMaxLength($products, 'weight') . "\n";
//echo $maxWeightLength;