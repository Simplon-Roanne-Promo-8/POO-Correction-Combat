<?php



abstract class Monster {
    private string $name;
    private int $hp;
    private string $type;


    public function __construct($name, $pv)
    {
        $this->name = $name;
        $this->hp = $pv;
        $this->type = get_class($this);

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

    public function getType(){
        return $this->type;
    }    


    public function setName($name){
        $this->name = $name;
    }
    
    public function setHp($hp){
        $this->hp = $hp;
    }

    public function setType($type){
        $this->type = $type;
    }

}