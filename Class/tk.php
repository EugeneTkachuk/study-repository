<?php
require 'functions.php'; // подключаем внешний файл с функциями

class Product
{
    public $name;
    public $price;
    public $weight;
    public $area;
    public $delivery;
    public $payment;
    public $food;


    public function __construct($name, $price, $weight, $area, $delivery, $payment, $food)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->area = $area;
        $this->delivery = $delivery;
        $this->payment = $payment;
        $this->food = $food;

    }

    public static function createFromArray(array $data): Product
    {
        return new self ($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
    }


    public function __toString(): string
    {
        return $this->name;
    }
}

$file = 'products.csv';
$str = file_get_contents($file);
$list = explode("\n", $str);
$products = [];
foreach ($list as $line) {
    if (strlen($line) == 0) {
        continue;
    }
    $p = explode(";", $line);
    $pro = Product::createFromArray($p);
    $products[] = $pro;
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

<html lang="utf-8">
<head>
    <meta charset="utf-8"/>
    <title>Таблица</title>
</head>
<body>

<a href="/Class/Create.php"> Новый товар, </a>
<a href="/Class/checkout.php"> Корзина, </a>
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
                <a href="add.php?name=<?php echo $value->name;?>">
                    в корзину
                </a>
            </td>
            <td>
                <a href="delete.php?name=<?php echo $value->name;?>">
                    удалить
            </td>
        </tr>
    <?php } ?>
</table>
<br>

<?php for ($i = 0; $i < $pages; $i++): ?>
    <a href="/Class/tk.php?page=<?php echo $i + 1 ?>"><?php echo $i + 1 ?> </a>
<?php endfor ?>

<?php if (count($_FILES) > 0) {
    $name = 'upload/' . $_FILES["document"]["name"];
    move_uploaded_file($_FILES["document"]["tmp_name"], $name);
} ?>

<form method="post" enctype="multipart/form-data"
<input type="file" name="document"/>
<button type="submit">Send!</button>

<form method="get">
    <label>
        <input value="<?php echo $search ?>" type="text" name="search" placeholder="Поиск...">
    </label>
    <button>Искать</button>

</form>
</body>
</html>
