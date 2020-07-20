<?php 
    abstract class AbstractGoods{

        protected $category;

        protected function __construct($category) {
            $this->category =   $category;
        }

        abstract protected function getPrice();
        abstract protected function getProfit();
        abstract protected function getCatalog();
        abstract protected function getTotalPrice();
    }

    class PackagedGoods extends AbstractGoods {	
        
        public 		$sellPrice;
        protected 	$name;
        protected 	$discount;
        protected 	$artNumber;
        protected 	$purchasePrice;
                
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount) {
            parent::__construct($category);
            $this->artNumber =      $artNum;
            $this->name =           $name;
            $this->purchasePrice =  $purchasePrice;
            $this->sellPrice =      $sellPrice;
            $this->discount =       $discount;
        }
        function getPrice() {
            return $this->price;
        }
        function getCatalog() {
            return $this->category;
        }
        function getTotalPrice(){
            return $totalPrice = ( $this->sellPrice - $this->sellPrice * $this->discount / 100 );
        }
        function getProfit() {
            return $profit = ( $this->getTotalPrice() - $this->purchasePrice );
        }
        function getInfo() {
            $info  = "кат. {$this->category}; ";
            $info .= "арт. {$this->artNumber}; ";
            $info .= "наим. {$this->name}; ";
            $info .= "закуп. цена {$this->purchasePrice} руб.; ";
            $info .= "цена {$this->sellPrice} руб.; ";
            $info .= "скидка {$this->discount} %; ";
            $info .= "доход: {$this->getProfit()} руб.";
            $info .= "</br>";
            return $info;
        }
    }
    
    class Software extends PackagedGoods {
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount) {
            parent::__construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount);
        }
        function setSellPrice(){
            return $this->sellPrice = ( parent::sellPrice / 2 );
        }
    }
    
    class Goods extends PackagedGoods {
        protected $quantity;
        
        function __construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount, $quantity) {
            parent::__construct($category, $artNum, $name, $purchasePrice, $sellPrice, $discount);
            $this->quantity = $quantity;
        }
        function getTotalPrice(){
            return $this->totalPrice = $this->quantity * ( $this->sellPrice - $this->sellPrice * $this->discount / 100 );
        }
        function getProfit() {
            return $profit = ( $this->getTotalPrice() - $this->purchasePrice * $this->quantity );
        }
    }
    
    $fitosrbt = new PackagedGoods("Packed", 1001, "Фитосорбовит", 110, 200, 25);
    $dietSoft = new Software ("Soft", 2001, "ПО Диета", 60, $fitosrbt->sellPrice / 2, 10);
    $tea = new Goods("Unpacked", 3001, "Чай", 12, 10, 0, 15);
    echo $fitosrbt->getInfo()."\n";
    echo $dietSoft->getInfo()."\n";
    echo $tea->getInfo()."\n";
