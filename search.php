<?php
session_start();
if (false === isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
require 'functions.php';
$pdo = getDbConnection();
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    include $class . '.php';
});
// mysql user - root
// mysql password - нету пустота
use MyClassWork\Product;

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
            ]
    );
}
$search = $_GET['search'] ?? '';
$products = array_filter($products, function ($item) use ($search) {
    return $search === '' || str_contains($item->name, $search);
});
if (isset($_GET['page'])) {// определяем текущую страницу
    $page = (int)$_GET['page'];
    setcookie("page", $page, time() + (86400 * 30), "/"); // устанавливаем куки на 30 дней
} else if (isset($_COOKIE["page"])) {  // проверяем, если нет страницы то берем из кука
    $page = (int)$_COOKIE["page"];
} else {                   // если нет страницы, то 1 по умолчанию
    $page = 1;
}
$per_page = 1;
$total = count($products);
$pages = ceil($total / $per_page);
$start = ($page - 1) * $per_page;
$products = array_splice($products, $start, $per_page);
?>

<table width="300px" border="4" cellpadding="5">
    <tr>
        <td><b>Продукты</b></td>
        <td><b>Цена</b></td>
        <td><b>Вес</b></td>
        <td><b>Описание продукта</b></td>
        <td><b>Доставка</b></td>
        <td><b>Оплата</b></td>
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
