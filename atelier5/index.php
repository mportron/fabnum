<?php
/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 14/04/17
 * Time: 11:25
 */

include "Voiture.php";


$voiture=new voiture('aaaa');


echo "La marque de cette voiture est de ".$voiture->getMarque().' modele :'.$voiture->getModele();

