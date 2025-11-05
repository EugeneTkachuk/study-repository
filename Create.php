<?php

if (count($_POST) > 0) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $area = $_POST['area'];
    $delivery = $_POST['delivery'];
    $cash = $_POST['payment'];
    $food = $_POST['food'];
    $file = "products.csv";
    $allProperties = [$name, $price, $weight, $area, $delivery,$cash,$food[0]];
    $lines = implode(';', $allProperties) . "\n";
    file_put_contents($file, $lines, FILE_APPEND);


}

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Список товаров</title>
    <a href="/tk.php"> Список товаров, </a>
</head>

<form method="POST" enctype="multipart/form-data">
    Название:
    <select name="name">
        <option>Milk</option>
        <option>Oil</option>
        <option>Salad</option>
        <option>Cheese</option>
        <option>Orange</option>
        <option>Banana</option>
        <option>Yogurt</option>
        <option>Water</option>
    </select>
    <br>
    Цена:
        <input type="text" name="price">
    <br>
    Вес:
        <input type="text" name="weight">
    <br>
    Описание :
    <br>
    <textarea name="area"></textarea>
    <br>
    Доставка:
        <br>
      Yes:<input type="radio" name="delivery" value="yes">
        <br>
      No:<input type="radio" name="delivery" value="no">
    <br>
    <br>
    Оплата:
    <br>
    Card:<input type="radio" name="payment" value="card"/>
        <br/>
    Cash:<input type="radio" name="payment" value="cash"/>
    <br>
    <br>
    Milk: <input type="checkbox" name="food[]" value="1"><br>
    Oil: <input type="checkbox" name="food[]" value="2"><br>
    Salad:<input type="checkbox" name="food[]" value="3"><br>
    Cheese:<input type="checkbox" name="food[]" value="4"><br>
    Orange:<input type="checkbox" name="food[]" value="5"><br>
    Banana:<input type="checkbox" name="food[]" value="6"><br>
    Yogurt:<input type="checkbox" name="food[]" value="7"><br>
    Water:<input type="checkbox" name="food[]" value="8"><br>
    <br>
    <button type="submit">Ok</button>
</form>
<body>
</html>