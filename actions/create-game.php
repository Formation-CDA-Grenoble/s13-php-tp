<?php

$DB = new PDO('mysql:host=127.0.0.1;port=3306;dbname=videogames;charset=UTF8;','root','root', array(PDO::ATTR_PERSISTENT=>true));
$statement = $DB->prepare("
INSERT INTO `game` (
    `title`,
    `link`,
    `release_date`,
    `developer_id`,
    `platform_id`
)
VALUES (
    :title,
    :link,
    :release_date,
    :developer_id,
    :platform_id
)
");
$statement->execute([
    ':title' => $_POST['title'],
    ':link' => $_POST['link'],
    ':release_date' => $_POST['release_date'],
    ':developer_id' => $_POST['developer_id'],
    ':platform_id' => $_POST['platform_id'],
]);

header('Location: /index.php');
