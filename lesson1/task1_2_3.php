<?php
// 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов: продукт, ценник, посылка и т.п.
// 2. Описать свойства класса из п.1 (состояние).
// 3. Описать поведение класса из п.1 (методы).
class Product
{
    private $name;
    private $price;
    private $brand;
    private $year;
    /**
     * consturctor for class Product
     * @param string      $name  nomi
     * @param int|integer $price narxi
     */
    public function __construct(string $name = "NoName", int $price = 0){
        $this->name = $name;
        $this->price = $price;
    }

    public function getName(){
    	return $this->name;
    }
    /**
     * @var $name string
     * @return string
     */
    public function setName($name){
    	return $this->name = $name;
    }

    public function getPrice(){
    	return $this->price;
    }
    
    public function setPrice($price){
    	return $this->price = $price;
    }

    public function getBrand(){
        return $this->brand ?? "noData";
    }
    
    public function setBrand($brand){
        return $this->brand = $brand;
    }

    public function getYear(){
        return $this->year ?? "noData";
    }

    public function setYear($year){
        return $this->year = $year;
    }
}
