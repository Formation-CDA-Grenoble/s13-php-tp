<?php

// var_dump($_POST); die();

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

$DB = new PDO('mysql:host=127.0.0.1;port=3306;dbname=videogames;charset=UTF8;','root','root', array(PDO::ATTR_PERSISTENT=>true));
$statement = $DB->prepare("
DELETE FROM `game`
WHERE `id` = :id
");
$result = $statement->execute([
    ':id' => $_POST['deleteId']
]);

if ($result === false) {
    addMessage('danger', 'Error while querying database! Please try again later!');
} else {
    addMessage('success', 'Game succesfully deleted!');
}

header('Location: /index.php');
