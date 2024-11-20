<?php

trait TraitA {
    function foo(){
        echo "Foo";
    }
}

trait TraitB {
    function bar(){
        echo "Bar";
    }
}

class ClasseC{
    use TraitA;
    use TraitB;
}

$classeC = new ClasseC;
$classeC->foo();
$classeC->bar();