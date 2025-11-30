<?php
$name = $_GET['name'];                                                                    // получаем товар из ссылки
$count = $_GET['count'];                                                                 // получаем товар из ссылки
if (!file_exists('checkout.csv'))                                                // если файла нет, то создаем
{
    file_put_contents('checkout.csv', '');
}
$str = file_get_contents('checkout.csv');
$lines = explode("\n", $str);


$shop = [];                                                                              // создаем массив
foreach ($lines as $line)                                                               // проходимся циклом по строкам
{
    if (empty($line))
    {
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
$found = false;                                                                      // проверка на наличие товара
foreach ($shop as $key => $item)                                                      // перебираем товар в корзине,
{
    if ($item['name'] == $name) {
        $shop[$key] ['count'] = $shop[$key]['count'] + 1;                            // если находит то увеличиваем на 1
        $found = true;
        break;
    }
}
if ($found === false)                                                              // если товара нет, добавляем
{
    $shop [] =
        [
            'name' => $name,
            'count' => 1
        ];
}
$newLine = [];                                                                    // собираем данные в файл
foreach ($shop as $item) {
    $newLine[] = $item['name'] . ',' . $item['count'];
}
file_put_contents('checkout.csv', implode("\n", $newLine) . "\n");// записываю в файл (в одне строку и перенос
header('Location: checkout.php');                                   // переход в корзину
