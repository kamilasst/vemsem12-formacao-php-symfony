<?php

$media = media(2, 2, 2);

function media($nota1, $nota2, $nota3){
    $media = ($nota1 + $nota2 + $nota3) / 3;
    return $media;
}

if ($media >= 0 and $media <= 5){
    echo "Nota baixa. Estude mais!";
} elseif ($media > 5 and $media <= 7){
    echo "Sua nota está OK";
} elseif ($media > 7 and $media <= 10){
    echo "Parabéns! Continue assim.";
} else{
    echo "Algo deu errado no cálculo da média. Tente novamente.";
}
