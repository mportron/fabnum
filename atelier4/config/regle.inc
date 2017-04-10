<?php

$regles=[
    '0-15'=>[
        'libelle'=>'Villes <15&deg;',
        'filtre'=>[
            'min'=>0,
            'max'=>15
        ]
    ],
    '16_20'=>[
        'libelle'=>'Villes entre 16 et 20&deg;',
        'filtre'=>[
            'min'=>15,
            'max'=>20
        ]
    ],
    '21-25'=>[
        'libelle'=>'Villes entre 21 et 25&deg;',
        'filtre'=>[
            'min'=>20,
            'max'=>25
        ]
    ],
    '25+'=>[
        'libelle'=>'Villes >  25&deg;',
        'filtre'=>[
            'min'=>25,
            'max'=>100
        ]
    ],



];

?>