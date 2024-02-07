<?php

include_once './config/connexion.php';
include_once './config/autoload.php';

$heroManager = new HeroesManager($connexion);
$hero = $heroManager->find($_GET['hero_id']);


$fightManager = new FightManager();
$monster = $fightManager->createMonster();

$_SESSION['hero_id'] = $hero->getId();

// $resultFight = $fightManager->fight($hero, $monster);
// $heroManager->update($hero);

// var_dump($hero);
// var_dump($monster);
// echo $_GET['hero_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="container d-flex flex-wrap justify-content-center align-items-center">

        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="https://www.smashbros.com/assets_v2/img/fighter/toon_link/main.png" class="card-img-top w-75 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $hero->getName() ?></h5>
                <p class="text-center m-0"><span id="pv_hero"><?= $hero->getHp() ?></span> pv</p>
                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $hero->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger progress-bar-hero" style="width: <?= $hero->getHp() ?>%"></div>
                </div>
            </div>
        </div>

        <h1>
            <button id="fight" class="btn btn-danger">
                VS
            </button>
        </h1>

        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="./images/Goblin.png" class="card-img-top w-75 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $monster->getName() ?></h5>
                <p class="text-center m-0"><span id="pv_monster"><?= $monster->getHp() ?></span> pv</p>
                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $monster->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger progress-bar-monster" style="width: <?= $monster->getHp() ?>%"></div>
                </div>
            </div>
        </div>

    </section>

    <section class="container" id="fight_message">
      
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./assets/js/fight.js"></script>
</body>

</html>