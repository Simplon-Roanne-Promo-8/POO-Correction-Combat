<?php


class Fantassin extends Monster
{
    public function hit(Hero $hero, $damage){
        if ($hero->getType() === "Mage") {
            $hero->setHp($hero->getHp() - ($damage * 2));
        }
        $hero->setHp($hero->getHp() - $damage * 2);
    }
}