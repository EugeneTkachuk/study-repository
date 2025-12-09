<?php
require 'functions.php';
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include $class . '.php';
});


// mysql user - root
// mysql password - нету пустота
use MyClassWork\Product;

$database = 'ET Data';
$user = 'root';
$password = "";


$pdo = new PDO('mysql:host=127.0.0.1;dbname=' . $database, $user, $password);
$stm = $pdo->query('SELECT * FROM product');
foreach ($stm as $row) {
    $products[] = Product::createFromArray
    (
            [
                    $row['name'],
                    $row['price'],
                    $row['weight'],
                    $row['description'],
                    $row['delivery'],
                    $row['payment'],
                    $row['save_product']
            ]
    );
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'])) {
    $stm = $pdo->prepare
    (
            'INSERT INTO product (`name`, `price`, `weight`, `description`, `delivery`, `payment`, `save_product`)
           VALUES (:name, :price, :weight, :description, :delivery, :payment, :save_product)'
    );
    $stm->bindValue(':name', $_POST['name']);
    $stm->bindValue(':price', $_POST['price']);
    $stm->bindValue(':weight', $_POST['weight']);
    $stm->bindValue(':description', $_POST['description']);
    $stm->bindValue(':delivery', $_POST['delivery']);
    $stm->bindValue(':payment', $_POST['payment']);
    $stm->bindValue(':save_product', $_POST['save_product']);
    $stm->execute();
}

$search = $_GET['search'] ?? '';
$products = array_filter($products, function ($item) use ($search) {
    return $search === '' ? true : str_contains($item->name, $search);
});
$per_page = 5;
$total = count($products);
$pages = ceil($total / $per_page);
$page = $_GET['page'] ?? 1;
$start = ($page - 1) * $per_page;
$products = array_splice($products, $start, $per_page);


?>

<html lang="utf-8" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <title>Таблица</title>
</head>
<body>

<a href="/create.php"> Новый товар, </a>
<a href="/checkout.php"> Корзина, </a>
<table width="300px" border="4" cellpadding="5">
    <tr>
        <td><b>Продукты</b></td>
        <td><b>Цена</b></td>
        <td><b>Вес</b></td>
        <td><b>Описание продукта</b></td>
        <td><b>Доставка</b></td>
        <td><b>Оплата</b></td>
        <td><b>Сохранить продукт</b></td>
        <td><b>Добавление</b></td>
        <td><b>Удаление</b></td>
    </tr>


    <?php foreach ($products as $value) { ?>
        <tr>
            <td>
                <?php echo $value ?>
            </td>
            <td>
                <?php echo $value->price ?>
            </td>
            <td>
                <?php echo $value->weight ?>
            </td>
            <td>
                <?php echo $value->area ?>
            </td>
            <td>
                <?php echo $value->delivery ?>
            </td>
            <td>
                <?php echo $value->payment ?>
            </td>

            <td>
                <label>
                    <input type="checkbox" value="<?php echo $value->food ?>" checked="<?php echo $value->food ?>"
                </label>
            </td>
            <td>
                <a href="add.php?name=<?php echo $value->name; ?>">
                    в корзину
                </a>
            </td>
            <td>
                <a href="delete.php?name=<?php echo $value->name; ?>">
                    удалить
            </td>
        </tr>
    <?php } ?>
</table>
<br>

<?php for ($i = 0; $i < $pages; $i++): ?>
    <a href="/index.php?page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?> </a>
<?php endfor ?>
<?php if (count($_FILES) > 0) {
    $name = 'upload/' . $_FILES["document"]["name"];
    move_uploaded_file($_FILES["document"]["tmp_name"], $name);
} ?>

<form method="post" enctype="multipart/form-data"
<input type="file" name="document"/>
<button type="submit">Send!</button>
</form
<form method="get">
    <label>
        <input value="<?php echo $search ?>" type="text" name="search" placeholder="Поиск...">
    </label>
    <button>Искать</button>
</form>
</body>
</html>