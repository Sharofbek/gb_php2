<?php 
// 4. Придумать наследников класса из п.1. Чем они будут отличаться?
require_once "task1_2_3.php";

class Phone extends Product
{
	public function __construct(string $name = "NoName", int $price = 0)
	{
		parent::__construct($name, $price);
	}


}


class Car extends Product
{
	private $doors;
	public function __construct(string $name = "NoName", int $price = 0, int $doors = 4)
	{
		$this->doors = $doors;
		parent::__construct($name, $price);
	}

    public function getDoors(){
        return $this->doors;
    }

    public function setDoors(int $doors){
        return $this->doors = $doors;
    }
}

$iPhoneX = new Phone("iPhoneX X", 1000);
$iPhoneX->setBrand('iPhoneX');
$zFlip = new Phone("Samsung Galaxy Z-Flip", 2500);
$zFlip->setBrand('Samsung');
echo "<pre>\n";
echo "\$iPhoneX->getPrice() = ".$iPhoneX->getPrice()."\n";
echo "\$zFlip->price = ".$zFlip->getPrice()."\n\n";

echo "\$iPhoneX->getName() = ".$iPhoneX->getName()."\n";
echo "\$zFlip->getName() = ".$zFlip->getName()."\n\n";

echo "\$iPhoneX->getBrand() = ".$iPhoneX->getBrand()."\n";
echo "\$zFlip->getBrand() = ".$zFlip->getBrand()."\n\n";

echo "\$iPhoneX->getYear() = ".$iPhoneX->getYear()."\n";
echo "\$zFlip->getYear() = ".$zFlip->getYear()."\n\n\n\n";

$teslaS = new Car('Tesla Model S', 55000);
$teslaS->setBrand("Tesla");
$teslaS->setYear(2015);

$zil = new Car('Зил-130', 25000);
$zil->setBrand("ЗИЛ");
$zil->setYear(1995);
$zil->setDoors(2);

echo "\$teslaS->getPrice() = ".$teslaS->getPrice()."\n";
echo "\$zil->price = ".$zil->getPrice()."\n\n";

echo "\$teslaS->getName() = ".$teslaS->getName()."\n";
echo "\$zil->getName() = ".$zil->getName()."\n\n";

echo "\$teslaS->getBrand() = ".$teslaS->getBrand()."\n";
echo "\$zil->getBrand() = ".$zil->getBrand()."\n\n";

echo "\$teslaS->getYear() = ".$teslaS->getYear()."\n";
echo "\$zil->getYear() = ".$zil->getYear()."\n\n";

echo "\$teslaS->getDoors() = ".$teslaS->getDoors()."\n";
echo "\$zil->getDoors() = ".$zil->getDoors()."\n\n\n\n";

echo "</pre>";
?>