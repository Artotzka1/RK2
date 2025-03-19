<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (:username, :password, :email)");
    $stmt->execute(['username' => $username, 'password' => $password, 'email' => $email]);

    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
            <a href="login.php">Войти</a>
            <a href="register.php">Регистрация</a>
        </nav>
    </header>
    <main>
        <h1>Регистрация</h1>
        <form method="POST">
            <label for="username">Логин:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Зарегистрироваться</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2025 Продуктовый магазин. Все права защищены.</p>
    </footer>
</body>

</html>