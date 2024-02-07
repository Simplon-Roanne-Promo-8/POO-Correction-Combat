<?php


abstract class Hero {

    private int $id;
    private string $name;
    private int $hp;
    private string $type;

    public function __construct($name, $hp)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->type = get_class($this);
    }

    public function hit(Monster $monster, $damage){
        $monster->setHp($monster->getHp() - $damage);
    }

    abstract public function specialHit(Monster $monster, $damage);

    // GETTER
    public function getId(){
        return $this->id;
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

    public function setType($type){
        $this->type = $type;
    }

    public function toArray(){
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'hp' => $this->getHp(),
            'type' => $this->getType(),
        ];
    }
}
