<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <nav>
            <a href="index.php">Главная</a>
            <a href="shop.php">Магазин</a>
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
        <h1>Добро пожаловать в наш магазин!</h1>
        <p>Здесь вы найдете лучшие товары по выгодным ценам.</p>
        <div id="slideshow">
            <div class="slide-wrapper">
                <div class="slide">
                    <img src="image1.jpg" alt="Хлеб">
                    <p style="text-align: center;">Хлеб</p>
                </div>
                <div class="slide">
                    <img src="image2.jpg" alt="Сыр">
                    <p style="text-align: center;">Сыр</p>
                </div>
                <div class="slide">
                    <img src="image3.jpg" alt="Печенье">
                    <p style="text-align: center;">Печенье</p>
                </div>
                <div class="slide">
                    <img src="image4.jpg" alt="Квас">
                    <p style="text-align: center;">Квас</p>
                </div>
                <div class="slide">
                    <img src="image5.jpg" alt="Бананы">
                    <p style="text-align: center;">Бананы</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2025 Продуктовый магазин. Все права защищены.</p>
    </footer>
</body>

</html>