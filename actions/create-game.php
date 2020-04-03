<?php

session_start();
if (empty($_POST['title'])) {
    $_SESSION['errorMessage'] = 'Game title cannot be empty!';
} else if (!filter_var($_POST['link'], FILTER_VALIDATE_URL)) {
    $_SESSION['errorMessage'] = 'External link must be a valid URL!';
} else if (!preg_match('/\d{4}-\d{2}-\d{2}/', $_POST['release_date'])) {
    $_SESSION['errorMessage'] = 'Date format is invalid!';
} else {

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
}

header('Location: /index.php');
