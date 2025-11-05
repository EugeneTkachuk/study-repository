    <?php
    require 'functions.php'; // подключаем внешний файл с функциями

    // создаем массивы с продуктами, каждый продукт - ассоциативный массив
    //$Apple = ['name' => 'Apple', 'price' => 193, 'weight' => 945];
    //$Banana = ['name' => 'Banana', 'price' => 270, 'weight' => 798];
    //$Orange = ['name' => 'Orange', 'price' => 1697, 'weight' => 898];
    //$strawberry = ['name' => 'strawberry', 'price' => 105, 'weight' => 850];
    //$food = [$Apple, $Banana, $Orange, $strawberry]; // создание массива из 4
    $file = 'products.csv'; // переменная с файлом
    //$lines = []; // пустой массив для сохранения строк
    //foreach ($food as $item) { // цикл для чтоб перебрать каждый масив из food, так как у нас массив в массиве
      // $lines[] = implode(';', $item); //преобразование в строку
    //}
    // записываем строки в CSV файл
    //file_put_contents($file, implode("\n", $lines));  // записываем данные в файл построчно

    // читаем содержимое CSV файла обратно
    $str = file_get_contents($file);// получаем текст из файла

    // разбиваем текст по строкам, каждая строка — один продукт
    $list = explode("\n", $str); // массив строк

    // создаём массив продуктов
    $products = []; // сдесь хранятся продукты


    // разбираем строку в массив
    foreach ($list as $line) {
        if (strlen($line) == 0) {
            continue;
        }
        $product = explode(";", $line);
        $products [] = [
                "name" => $product[0],
                "price" => $product[1],
                "weight" => $product[2],
                "area" => $product[3],
                "delivery" => $product[4],
                "payment" => $product[5],
                "food" => $product[6],

      ];


    }
    // получаем значение из строки параметров ?search=
    $search = $_GET['search'] ?? '';

    // фильтруем массив продуктов по поиску
    $products = array_filter($products, function ($item) use ($search) {
        return str_contains($item ['name'], $search);
    });

    // ПАГИНАЦИЯ
    $per_page = 5; // количество товаров на одной странице
    $total = count($products); // общее количество товаров после фильтра
    $pages = ceil($total / $per_page); // количество страниц
    $page = $_GET['page'] ?? 1; // текущая страница
    $start = ($page - 1) * $per_page; // с какого элемента начинать
    $products = array_splice($products, $start, $per_page); // отрезаем нужный кусок
    ?>

    <html>
    <head>
        <meta charset="utf-8"/>
        <title>Таблица</title>
    </head>
    <body>
    <a href="/create.php"> Новый товар, </a>
    <table width="300px" border="4" cellpadding="5">
        <tr>
            <td><b>Продукты</b></td>
            <td><b>Цена</b></td>
            <td><b>Вес</b></td>
            <td><b>Описание продукта</b></td>
            <td><b>Доставка</b></td>
            <td><b>Оплата</b></td>
            <td><b>Сохранить продукт</b></td>
        </tr>

        <?php foreach ($products as $value) { ?>
            <tr>
                <td>
                    <?php echo $value ["name"] ?>
                </td>
                <td>
                    <?php echo $value ["price"] ?>
                </td>
                <td>
                    <?php echo $value ["weight"] ?>
                </td>
                <td>
                    <?php echo $value ["area"]?>
                </td>
                <td>
                    <?php echo $value ["delivery"]?>
                </td>
                <td>
                    <?php echo $value ["payment"]?>
                </td>
                <td>
                   <input type="checkbox"value="<?php echo $value ["food"]?>" checked="<?php echo $value ["food"]?>"
                </td>
            </tr>
        <?php } ?>
    </table><br>

    <?php for ($i = 0; $i < $pages; $i++): ?>
    <a href=" /tk.php?page=<?php echo $i + 1?>"><?php echo $i + 1?> </a>
    <?php endfor ?>

    <?php if (count($_FILES) > 0) {
        $name = 'upload/' . $_FILES["document"]["name"];
        move_uploaded_file($_FILES["document"]["tmp_name"],$name);
    } ?>

    <form method="post" enctype="multipart/form-data"
        <input type="file" name="document"/>
        <button type="submit">Send!</button>
    </form>

    <form method="get">
        <input  value="<?php echo $search ?>" type="text" name="search" placeholder="Поиск...">
        <button>Искать</button>

    </form>
    </body>
    </html>