<?php

class HeroesManager {

    private PDO $connexion;

    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    public function add(Hero $hero){
        // Prepare et execute pour créer le hero

        $preparedRequest = $this->connexion->prepare('INSERT INTO heroes (name) VALUES (?)');
        
        $preparedRequest->execute([
            $hero->getName()
        ]);

        $id = $this->connexion->lastInsertId();

        $hero->setId($id);
    }


    public function findAllAlive(){
        $preparedRequest = $this->connexion->prepare('SELECT * FROM heroes WHERE health_point > 0');
        $preparedRequest->execute();
        $heroesArray = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $heroes = [];
        foreach ($heroesArray as $heroArray) {
            $hero = new Hero($heroArray['name'], $heroArray['health_point']);
            $hero->setId($heroArray['id']);
            array_push($heroes, $hero);
        }

        return $heroes;
    }


    public function find($id){
        $preparedRequest = $this->connexion->prepare("SELECT * FROM heroes WHERE id = ?");
        $preparedRequest->execute([
            $id
        ]);

        $heroArray = $preparedRequest->fetch(PDO::FETCH_ASSOC);

        $hero = new Hero($heroArray['name'], $heroArray['health_point']);
        $hero->setId($heroArray['id']);


        return $hero;


    }


    public function update(Hero $hero){

    }
}