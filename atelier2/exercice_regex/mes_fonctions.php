<?php

/**
 * @param string $ville
 * @param array $detail
 */

function afficheTemperature(string $ville, array $detail){

    $temperature=$detail['temperature'];
    $chaine="La température de {ville} est de {temperature} degrés";
    $chaine=preg_replace('/{ville}/',$ville,$chaine);
    $chaine=preg_replace('/{temperature}/',$temperature,$chaine);

    $icone='<img src="'.$detail['icone'].'" width="150" alt="le temps"/>';

    return ['phrase'=>$chaine,'icone'=>$icone];
}


?>