<?php

function tabuada($numero){
    for($i = 1; $i<= 10; $i++){
        $resultado = $numero * $i;
        echo "$numero x $i = $resultado" . PHP_EOL ;
    }
}

tabuada(4);

