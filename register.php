<?php
require "functions.php";
$pdo = getDbConnection();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo 'Заполнить все поля';
    } else {
        $hashedPassword = sha1($password);

        $stm = $pdo->prepare('INSERT INTO users (`login`, `password`) VALUES (:login, :password)');
        $stm->bindValue(':login', $_POST['login']);
        $stm->bindValue(':password', $hashedPassword);
        $stm->execute();
        $stm->fetch();

        header('Location: login.php');
        exit;
    }

}
?>
<form action="register.php" method="POST">
    <label for="login">Имя пользователя</label>
    <input type="text" id="login" name="login" required><br><br>

    <label for="password">Пароль</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Регистрация">
</form>









