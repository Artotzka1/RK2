<?php
session_start();
include 'db.php';

$stmt = $conn->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
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
        <h1>Каталог товаров</h1>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>"></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['price'] ?> руб.</td>
                        <td>
                            <a href="product.php?id=<?= $product['id'] ?>">Подробнее</a>
                            <?php if (isset($_SESSION['username'])): ?>
                                <form action="add_to_cart.php" method="POST" style="display: inline;">
                                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                    <button type="submit">В корзину</button>
                                </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2025 Продуктовый Магазин. Все права защищены.</p>
    </footer>
</body>

</html>