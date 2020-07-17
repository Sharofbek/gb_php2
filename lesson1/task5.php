<?php 
// Дан код:

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

// Что он выведет на каждом шаге? Почему?

echo "<br>\n1234 Потому что статические переменные принадлежат классам";

?>