<?php

if (isset($_GET['order']) && isset($_GET['order_direction'])) {
    $orderBy = $_GET['order'];
    $orderDirection = $_GET['order_direction'];
} else {
    $orderBy = 'id';
    $orderDirection = 'ASC';
}


$DB = new PDO('mysql:host=127.0.0.1;port=3306;dbname=videogames;charset=UTF8;','root','root', array(PDO::ATTR_PERSISTENT=>true));
$statement = $DB->query("
SELECT
	game.id,
    game.title, 
    game.release_date, 
    game.link, 
    
    platform.id AS platform_id,
    platform.name AS platform_name,
    platform.link AS platform_link,
    
    developer.id AS developer_id,
    developer.name AS developer_name,
    developer.link AS developer_link
    
FROM game 
JOIN platform ON platform.id = game.platform_id
JOIN developer ON developer.id = game.developer_id
ORDER BY $orderBy $orderDirection
");
$games = $statement->fetchAll(PDO::FETCH_OBJ);

// var_dump($games); die();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />
<body>
    <div class="container">
        <div class="card text-center">
            <img src="images/data-original.jpg" class="card-img-top" alt="Retro gaming banner">
            <div class="card-header">
                <h1 class="mt-4 mb-4">My beautiful video games</h1>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                            <?php
                                $criterion = 'id';
                                include 'templates/sort-button.php';
                            ?>
                        </th>
                        <th scope="col">
                            Title
                            <?php
                                $criterion = 'title';
                                include 'templates/sort-button.php';
                            ?>
                        </th>
                        <th scope="col">
                            Release date
                            <?php
                                $criterion = 'release_date';
                                include 'templates/sort-button.php';
                            ?>
                        </th>
                        <th scope="col">
                            Developer 
                            <?php
                                $criterion = 'developer_name';
                                include 'templates/sort-button.php';
                            ?>
                        </th>
                        <th scope="col">
                            Platform 
                            <?php
                                $criterion = 'platform_name';
                                include 'templates/sort-button.php';
                            ?>
                        </th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($games as $game): ?>
                    <tr>
                        <th scope="row">
                            <?= $game->id ?>
                        </th>
                        <td>
                            <a href="<?= $game->link ?>" target="_blank">
                                <?= $game->title ?>
                            </a>
                        </td>
                        <td>
                            <?= (new DateTime($game->release_date))->format('d M Y') ?>
                        </td>
                        <td>
                            <a href="<?= $game->developer_link ?>" target="_blank">
                                <?= $game->developer_name ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= $game->platform_link ?>" target="_blank">
                                <?= $game->platform_name ?>
                            </a>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    <form>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                <input type="text" name="title" placeholder="Title" />
                                <br />
                                <input type="text" name="link" placeholder="External link" />
                            </td>
                            <td>
                                <input type="date" name="release_date" />
                            </td>
                            <td>
                                <select name="developer">
                                    <option value="1">Bullfrog Productions</option>
                                    <option value="2">id Software</option>
                                </select>
                            </td>
                            <td>
                                <select name="platform">
                                    <option value="1">SNES</option>
                                    <option value="2">MS-DOS</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                            <td></td>
                        </tr>
                    </form>
                </tbody>
            </table>
            <div class="card-body">
                <p class="card-text">This interface lets you sort and organize your video games!</p>
                <p class="card-text">Let us know what you think and give us some love! 🥰</p>
            </div>
            <div class="card-footer text-muted">
                Created by <a href="https://github.com/Formation-CDA-Grenoble">CDA Grenoble</a> &copy; 2020
            </div>
        </div>
    </div>
</body>
</html>