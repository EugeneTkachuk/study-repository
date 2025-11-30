<?php

// если файла нет то создадим его хотя бы пустым
if (false === file_exists('checkout.csv')) {
    file_put_contents('checkout.csv', '');
}

$checkout = explode("\n", file_get_contents('checkout.csv'));

// формируем все что есть в корзине
$shop = [];
foreach ($checkout as $line) {
    // пропускаем пустые строки если такие есть
    if (empty($line)) {
        continue;
    }

    $element = explode(",", $line); // допустим это массив с названием и количеством
    $name = $element[0];
    $count = $element[1];

    $shop[] = [
        'name' => $name,
        'count' => $count,
    ];
}

?>

<a href="/tk.php"> Назад на список товаров </a>
<table width="300px" border="4" cellpadding="5">
    <tr>
        <td><b>Продукты</b></td>
        <td><b>Кол-во</b></td>
    </tr>

    <?php foreach ($shop as $item): ?>
    <tr>
        <td><?php echo $item['name'] ?></td>
        <td><?php echo $item['count'] ?></td>
    </tr>
    <?php endforeach ?>
</table>
