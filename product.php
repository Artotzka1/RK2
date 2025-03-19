<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: shop.php');
    exit;
}

$product_id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $product_id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header('Location: shop.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name'] ?></title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Каталог</a>
            <?php if (isset($_SESSION['username'])): ?>
                <a href="cart.php">Корзина</a>
                <a href="logout.php">Выйти</a>
            <?php else: ?>
                <a href="login.php">Войти</a>
                <a href="register.php">Регистрация</a>
            <?php endif; ?>
        </nav>
    </header>
    <main>
        <h1><?= $product['name'] ?></h1>
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <p><?= $product['description'] ?></p>
        <p>Цена: <?= $product['price'] ?> руб.</p>
        <p>Количество: <?= $product['quantity'] ?></p>
        <?php if (isset($_SESSION['user_id'])): ?>
            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                <button type="submit">Добавить в корзину</button>
            </form>
        <?php else: ?>
            <p>Чтобы добавить товар в корзину, <a href="login.php">войдите</a> в систему.</p>
        <?php endif; ?>
        <button onclick="window.history.back();">Назад</button>
    </main>
    <footer>
        <p>&copy; 2025 Продуктовый магазин. Все права защищены.</p>
    </footer>
</body>

</html>