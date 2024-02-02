<?php



class FightManager {



    public function createMonster(){
        $monster = new Monster('Ganon', 100);
        return $monster;
    }


    public function fight(Hero $hero, Monster $monster){

        $result = [];

        while ($hero->getHp() > 0 && $monster->getHp() > 0) {
            $damage = rand(0, 15);
            $monster->hit($hero, $damage); 
            array_push($result, 'Le monstre frappe le hero et lui inflige ' .$damage . " dégâts ! " );  
            if ($hero->getHp() > 0) {
                $damage = rand(0, 15);
                $hero->hit($monster, $damage);
                array_push($result, 'Le hero frappe le monstre et lui inflige ' .$damage . " dégâts ! " );  
            }
        }
        return $result;
    }


    
}