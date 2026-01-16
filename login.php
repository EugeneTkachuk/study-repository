<?php
require "functions.php";
$pdo = getDBConnection();
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $hashedPassword = sha1($password);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $stmt->execute(['login' => $login, 'password' => $hashedPassword]);
    $user_data = $stmt->fetch();
    if ($user_data) {
        $_SESSION['user'] = $user_data['login'];
        header('Location: index.php');
        exit;
    }
    $error = "Неверный логин или пароль";
}
?>


<html>
<h3>Вход в систему</h3>
<form method="POST">
    <input type="text" name="login" placeholder="Логин" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit" name="login_btn">Войти</button>
    <?php if (false === empty($error)): ?>
        <strong style="color:red;"><?php echo $error ?></strong>
    <?php endif ?>
</form>
</html>

