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


    //A priori on ne connait pas la source de l'image qui peut être soit de type fichier ou de type url
    //Donc on créé une variable que l'on va déterminer suivant une petite grille de test
    $src_icone='';

    /*
     * Désormais la provenance de l'image est indiquée.
     * Elle peut prendre 2 valeurs : fichier / url
     * Selon le cas, un traitement différent est à effectuer
     */
    switch($detail['source']){

        case 'fichier':
            $src_icone=$detail['icone'];

            break;

        case 'url':
            //Vérification que l'url contient bien http://.... sinon on préfixe
            if(!preg_match('/http/',$detail['icone'])){
                $src_icone='http://'.$detail['icone'];//On vient de rajouter http:// à l'url et on obtient une adresse valide
            }
            else {
                $src_icone=$detail['icone'];
            }
            break;
    }

    $icone='<img src="'.$src_icone.'" width="150" alt="le temps"/>';

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

/**
 * @return array
 *
 * Nouvelle fonction permettant de charger les données stockées
 * dans le fichier datas-sources/datas.csv
 */
function chargerDatas(){

    $fDatas=fopen('datas-sources/datas.csv','r');

    $datas=[];
    while(!feof($fDatas)){//tant que la fin du fichier n'est pas atteinte
        $ligne=fgetcsv($fDatas,null,";");
        //pour mémo ligne est un tableau

        //remplissage du tableau $datas
        /*
         * La clé est la première colonne de la ligne
         * la température la 2eme
         * etc...
         */
        $datas[$ligne[0]]=[
            'temperature'=>$ligne[1],
            'icone'=>$ligne[2],
            'source'=>$ligne[3] // on indique la provenance de l'image (fichier ou url)
        ];
    }

    return $datas;
}

?>