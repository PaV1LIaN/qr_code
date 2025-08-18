<?php
$dsn = 'mysql:host=localhost;dbname=qr_opros';
$username = 'root';
$password = 'root';

$pdo = new PDO($dsn, $username, $password);
$blocks = $pdo->query("SELECT ID_CAR, NAME_CAR, TYPE_CAR, NOM_CAR FROM cars")->fetchAll(PDO::FETCH_ASSOC);

foreach($blocks as $block) {
    // Безопасно экранируем все выводимые данные
    $id   = (int) $block['ID_CAR'];
    $name = htmlspecialchars($block['NAME_CAR'], ENT_QUOTES, 'UTF-8');
    $type = htmlspecialchars($block['TYPE_CAR'], ENT_QUOTES, 'UTF-8');
    $nom  = htmlspecialchars($block['NOM_CAR'],  ENT_QUOTES, 'UTF-8');

    echo '<div class="block" data-id="' . $id . '">';
    echo '<h4>' . $name . '</h4>';
    echo '<p>' . $type . '</p>';
    echo '<p>' . $nom  . '</p>';

    // Вот здесь исправлено:
    echo '<a href="/local/qr-opros/prepare.php?car_id=' . $id . '" class="btn btn-success">Оформить</a><br />';

    echo '<div class="remove-btn">Деактивировать</div>';
    echo '</div>';
}
?>