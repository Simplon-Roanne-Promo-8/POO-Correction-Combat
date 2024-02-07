<?php



class FightManager {



    public function createMonster(){
        $monstersChoices = ['Ogre', 'Fantassin', 'Sorcier'];
        $monsterKey = rand(0, count($monstersChoices) -1);
        $monster = new $monstersChoices[$monsterKey]($monstersChoices[$monsterKey], 100);
        return $monster;
    }


    public function fight(Hero $hero, Monster $monster){

        $result = [];
        $countTurn = 0;
        while ($hero->getHp() > 0 && $monster->getHp() > 0) {
            $damage = rand(0, 15);
            $critique = $countTurn % 2;
            $monster->hit($hero, $damage); 
            array_push($result, 'Le monstre frappe le hero et lui inflige ' .$damage . " dégâts ! " );  
            if ($hero->getHp() > 0) {
                $damage = rand(0, 15);
                if (!$critique) {
                    $hero->hit($monster, $damage);
                }else{
                    $hero->specialHit($monster, $damage);
                }
                $hero->hit($monster, $damage);
                array_push($result, 'Le hero frappe le monstre et lui inflige ' .$damage . " dégâts ! " );  
            }
            $countTurn++;
        }
        return $result;
    }




    
}