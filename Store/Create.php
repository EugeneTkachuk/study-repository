<?php
namespace Store;
if (count($_POST) > 0) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $area = $_POST['area'];
    $delivery = $_POST['delivery'];
    $cash = $_POST['payment'];
    $food = $_POST['food'];
    $file = "products.csv";
    $allProperties = [$name, $price, $weight, $area, $delivery, $cash, $food[0]];
    $lines = implode(';', $allProperties) . "\n";
    file_put_contents($file, $lines, FILE_APPEND);


}

?>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список товаров</title>
</head>
<body>
<a href="/Store/tk.php"><- Список товаров</a>
<br />
<br />
<div style="width: 400px">
<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Название</legend>
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
    </fieldset>

    <fieldset>
        <legend>Цена</legend>
        <input type="text" name="price">
    </fieldset>

    <fieldset>
        <legend>Вес</legend>
        <input type="text" name="weight">
    </fieldset>

    <fieldset>
        <legend>Описание</legend>
        <textarea name="area"></textarea>
    </fieldset>

    <fieldset>
        <legend>Доставка</legend>
        Yes:<label>
            <input type="radio" name="delivery" value="yes">
        </label>
        <br>
        No:<label>
            <input type="radio" name="delivery" value="no">
        </label>
    </fieldset>

    <fieldset>
        <legend>Оплата</legend>
        Card:<label>
            <input type="radio" name="payment" value="card"/>
        </label>
        <br/>
        Cash:<label>
            <input type="radio" name="payment" value="cash"/>
        </label>
    </fieldset>

    <fieldset>
        <legend>Тип продукта</legend>
        Milk: <label>
            <input type="checkbox" name="food[]" value="1">
        </label><br>
        Oil: <label>
            <input type="checkbox" name="food[]" value="2">
        </label><br>
        Salad:<label>
            <input type="checkbox" name="food[]" value="3">
        </label><br>
        Cheese:<label>
            <input type="checkbox" name="food[]" value="4">
        </label><br>
        Orange:<label>
            <input type="checkbox" name="food[]" value="5">
        </label><br>
        Banana:<label>
            <input type="checkbox" name="food[]" value="6">
        </label><br>
        Yogurt:<label>
            <input type="checkbox" name="food[]" value="7">
        </label><br>
        Water:<label>
            <input type="checkbox" name="food[]" value="8">
        </label><br>
        <input typ="link">
    </fieldset>

    <br>
    <button type="submit">Ok</button>
</form>
</div>
</body>
</html>
