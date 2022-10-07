<?php

$arr = [1,5,3,0];

$qtd_elementos_array = count ($arr); // 4 - 1 // 3

// $i =0
// $posicaoAtual = 0

for ($i=0; $i < $qtd_elementos_array -1; $i++) { 
    for ($PosicaoAtual=0; $PosicaoAtual < $qtd_elementos_array -$i -1; $PosicaoAtual++) { 
        
        $ProximaPosicao = $PosicaoAtual+1; // 1

        if ($arr[$ProximaPosicao] < $arr[$PosicaoAtual]) {
            
            $auxiliar = $arr [$PosicaoAtual];
            $arr[$PosicaoAtual] = $arr[$ProximaPosicao];
            $arr[$ProximaPosicao] = $auxiliar;
        }
    }
}
print_r($arr) . "\n";

//print_r( sort($arr)); função que ordena os valores do array