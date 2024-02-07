<?php

require "../config/autoload.php";
require "../config/connexion.php";

$heroManager = new HeroesManager($connexion);
$hero = $heroManager->find($_SESSION['hero_id']);
$monster = $_SESSION['monster'];


$fightManager = new FightManager();

$result = $fightManager->fightAjax($hero, $monster);

$_SESSION['monster'] = $monster;
$heroManager->update($hero);
echo json_encode(['result'=> $result, 'hero'=> $hero->toArray(), 'monster'=> $monster->toArray()]);

