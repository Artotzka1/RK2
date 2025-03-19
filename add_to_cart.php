<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    echo "Пожалуйста, авторизуйтесь.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    // Проверяем, есть ли товар уже в корзине
    $stmt = $conn->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_id = :product_id");
    $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    $existing_item = $stmt->fetch();

    if ($existing_item) {
        // Если товар уже есть в корзине, увеличиваем количество
        $new_quantity = $existing_item['quantity'] + 1;
        $stmt = $conn->prepare("UPDATE cart SET quantity = :quantity WHERE id = :id");
        $stmt->execute(['quantity' => $new_quantity, 'id' => $existing_item['id']]);
    } else {
        // Если товара нет в корзине, добавляем его
        $stmt = $conn->prepare("INSERT INTO cart (user_id, product_id, quantity) VALUES (:user_id, :product_id, 1)");
        $stmt->execute(['user_id' => $user_id, 'product_id' => $product_id]);
    }

    header('Location: cart.php');
    exit;
}
?>