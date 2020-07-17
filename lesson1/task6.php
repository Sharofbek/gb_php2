<?php 
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo();
echo "<br>\n1122 Потому что статические переменные принадлежат классам. А здесь используется 2 класса";
?>