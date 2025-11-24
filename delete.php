<?php

$name = $_GET['name'];

if (!file_exists('checkout.csv'))                                                // если файла нет, то создаем
{
    file_put_contents('checkout.csv', '');
}

$str = file_get_contents('checkout.csv');
$lines = explode("\n", $str);

$shop = [];
foreach ($lines as $line)                                                               // проходимся циклом по строкам
{
    if (empty($line)) {
        continue;
    }
    $parts = explode(',', $line);                                             // режем
    $lineName = $parts[0];
    $lineCount = $parts[1];
    $shop [] =                                                                         // массив корзины
        [
            'name' => $lineName,
            'count' => $lineCount
        ];
}
$newShop = [];
foreach ($shop as $item) {
    if ($item['name'] === $name) {
        if ($item['count'] > 1) {
            $item['count'] = $item['count'] - 1;
            $newShop[] = $item;
        }

        continue;
    }
    $newShop[] = $item;
}
$newLines = [];
foreach ($newShop as $item) {
    $newLines[] = $item['name'] . ',' . $item['count'];
}

file_put_contents('checkout.csv', implode("\n", $newLines) . "\n");

header('Location: checkout.php');

