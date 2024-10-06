<?php
 class calculator {
    // Methode zur Addition
    public function add($a, $b){
        return $a + $b;
    }

    // Methode zur Subtraktion
    public function subtract($a, $b) {
        return $a - $b;
    }

    // Methode zur Multiplikation
    public function multiply($a, $b) {
        return $a * $b;
    }

    // Methode zur Division
    public function divide($a, $b) {
        if ($b ==0) {
            throw new Exception("Division durch Null ist nicht erlaubt!");
        }
        return $a/$b;
        }

    }
       
    ?>