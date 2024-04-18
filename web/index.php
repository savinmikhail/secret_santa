<?php

require_once __DIR__ . '/../' .'SecretSanta.php';

// Проверяем, были ли переданы данные формы
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Получаем список участников из формы
    $participants = isset($_POST['participants']) ? explode("\n", $_POST['participants']) : [];

    // Удаляем пустые строки и лишние пробелы
    $participants = array_map('trim', array_filter($participants));

    // Создаем экземпляр класса SecretSanta
    $santa = new SecretSanta($participants);

    // Генерируем пары и отправляем уведомления
    ob_start(); 
    $santa->sendNotifications();

    echo "<pre>" . ob_get_clean() ."</pre>" . "<br>";
    echo "Secret Santa пары сгенерированы и отправлены участникам!";
} else {
    header("Location: index.html");
    exit;
}
