<?php


class Hero {

    private int $id;
    private string $name;
    private int $hp;

    public function __construct($name, $hp)
    {
        $this->name = $name;
        $this->hp = $hp;
    }

    public function hit(Monster $monster, $damage){
        $monster->setHp($monster->getHp() - $damage);
    }

    // GETTER
    public function getid(){
        return $this->id;
    }  

    public function getName(){
        return $this->name;
    }    

    public function getHp(){
        return $this->hp;
    }    
    
    // SETTER 
    public function setId($id){
        $this->id = $id;
    }

    public function setName($name){
        $this->name = $name;
    }
    
    public function setHp($hp){
        $this->hp = $hp;
    }
}

new Hero('Toto', 100);