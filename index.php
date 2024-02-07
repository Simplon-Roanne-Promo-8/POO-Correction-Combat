<?php 

include_once './config/connexion.php';
include_once './config/autoload.php';

$heroManager = new HeroesManager($connexion);
if (!empty($_POST['name']) && !empty($_POST['type'])) {


    if (class_exists($_POST['type'])) {
        $hero = new $_POST['type']($_POST['name'], 100);
    }else{
        throw new Exception("Y'a pas mec", 1);
    }

    $heroManager->add($hero);
    
}
$heroes = $heroManager->findAllAlive();

// echo '<pre>';
// var_dump($heroes);
// echo '</pre>';


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
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
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

    <section class="container m-5 d-flex flex-wrap justify-content-center">
        <form action="" class="d-flex flex-column align-items-center" method="post">
            <label for="" class="m-2"> Créer un héro</label>
            <input type="text" class="m-2" name="name" placeholder="Nom du hero">
            <select name="type" id="type">
                <option value="Guerrier">Guerrier</option>
                <option value="Archer">Archer</option>
                <option value="Mage">Mage</option>
            </select>
            <button class="btn btn-danger" type="submit"> Créer le hero</button>
        </form>
    </section>


    <section class="container d-flex flex-wrap justify-content-center">

    <?php foreach ($heroes as $hero) { ?>
        <div class="card m-2 d-flex" style="width: 18rem;">
            <img src="https://www.smashbros.com/assets_v2/img/fighter/toon_link/main.png" class="card-img-top w-75 mx-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center m-2"><?= $hero->getName() ?></h5>
                <p class="card-title text-center m-2"><?= $hero->getType() ?></p>

                <div class="progress m-2" role="progressbar" aria-label="Danger example" aria-valuenow="<?= $hero->getHp() ?>" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-danger" style="width: <?= $hero->getHp() ?>%"><?= $hero->getHp() ?>%</div>
                </div>
                <div class="w-100 d-flex justify-content-center">
                    <a href="./fight.php?hero_id=<?=$hero->getId()?>" class="btn btn-success m-2">Choisir</a>
                </div>
            </div>
        </div>

    <?php } ?>

    </section>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>