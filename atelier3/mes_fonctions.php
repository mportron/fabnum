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

/**
 * @param array $meteo
 * @param int $seuil
 * @return array
 */
function triVilleTemperatureMinimum(array $meteo, int $seuil){

    $resultat=array_filter($meteo,function($item) use($seuil){
        if($item['temperature']>$seuil){
            return true;
        }
    });

    return $resultat;
}

/**
 * @param array $meteo
 */
function ajouterCommentaire(array $meteo){

    $resultat=array_map(function($item){
        $item['commentaire']='chaud chaud';
        return $item;
    },$meteo);

    return $resultat;
}
?>