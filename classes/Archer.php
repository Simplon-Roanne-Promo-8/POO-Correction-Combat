<?php



class Archer extends Hero 
{
    public function specialHit(Monster $monster, $damage)
    {
        $monster->setHp($monster->getHp() - ($damage * 1.5));
    }
}