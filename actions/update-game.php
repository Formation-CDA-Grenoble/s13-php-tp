<?php

session_start();
if (!isset($_SESSION['messages'])) {
    $_SESSION['messages'] = [];
}

function addMessage(string $type, string $message): void {
    array_push($_SESSION['messages'], [
        'type' => $type,
        'message' => $message
    ]);
}

$valid = true;

if (empty($_POST['title'])) {
    addMessage('danger', 'Game title cannot be empty!');
    $valid = false;
}

if (!filter_var($_POST['link'], FILTER_VALIDATE_URL)) {
    addMessage('danger', 'External link must be a valid URL!');
    $valid = false;
}

if (!preg_match('/\d{4}-\d{2}-\d{2}/', $_POST['release_date'])) {
    addMessage('danger', 'Date format is invalid!');
    $valid = false;
}

if ($valid) {
    $DB = new PDO('mysql:host=127.0.0.1;port=3306;dbname=videogames;charset=UTF8;','root','root', array(PDO::ATTR_PERSISTENT=>true));
    $statement = $DB->prepare("
    UPDATE `game`
    SET
        `title` = :title,
        `link` = :link,
        `release_date` = :release_date,
        `developer_id` = :developer_id,
        `platform_id` = :platform_id
    WHERE `id` = :id
    ");
    $result = $statement->execute([
        ':title' => $_POST['title'],
        ':link' => $_POST['link'],
        ':release_date' => $_POST['release_date'],
        ':developer_id' => $_POST['developer_id'],
        ':platform_id' => $_POST['platform_id'],
        ':id' => $_POST['id']
    ]);

    if ($result === false) {
        addMessage('danger', 'Error while querying database! Please try again later!');
    } else {
        addMessage('success', 'Game succesfully updated!');
    }
}

header('Location: /index.php');
