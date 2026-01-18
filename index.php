<html lang="utf-8" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <title>Таблица</title>
</head>
<body>

<a href="/create.php"> Новый товар, </a>
<a href="/checkout.php"> Корзина, </a>
<div id="tableContent">
    <?php include "search.php"; ?>;
</div>


<form method="post" enctype="multipart/form-data">
    <input type="file" name="document"/>
    <button type="submit">Send!</button>
</form>
<form method="get">
    <label>
        <input value="<?php echo($_GET['search'] ?? '') ?>" id="input" oninput="loadData()" name="search"
               placeholder="Поиск...">
    </label>
</form>
<script>
    function loadData() {
        const value = document.querySelector('#input').value;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("tableContent").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "/search.php?search=" + value, true);
        xhttp.send();
    }
</script>
<button type="button">Поиск</button>

</body>
</html>
