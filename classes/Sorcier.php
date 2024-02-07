<?php


class Sorcier extends Monster
{
    public function hit(Hero $hero, $damage){
        if ($hero->getType() === "Guerrier") {
            $hero->setHp($hero->getHp() - ($damage * 2));
        }
        $hero->setHp($hero->getHp() - $damage * 2);
    }
}