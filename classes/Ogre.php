<?php


class Ogre extends Monster
{
    public function hit(Hero $hero, $damage){
        if ($hero->getType() === "Archer" ) {
            $hero->setHp($hero->getHp() - ($damage * 2));
        }
        $hero->setHp($hero->getHp() - $damage );
    }
}