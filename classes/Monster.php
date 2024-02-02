<?php



class Monster {
    private string $name;
    private int $hp;


    public function __construct($name, $pv)
    {
        $this->name = $name;
        $this->hp = $pv;
    }

    public function hit(Hero $hero, $damage){
        $hero->setHp($hero->getHp() - $damage );
    }


    public function getName(){
        return $this->name;
    }    

    public function getHp(){
        return $this->hp;
    }    

    public function setName($name){
        $this->name = $name;
    }
    
    public function setHp($hp){
        $this->hp = $hp;
    }

}