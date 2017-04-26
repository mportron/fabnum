<?php

function __autoload($class_name){
    include $class_name.'.php';
}


$voiture=new Voiture('Renault','Clio');
$voiture->setMotorisation('moteur a essence');
$voiture->setNbroues(4);
echo $voiture;
echo "<hr/>";

$peugeot=new Voiture('Peugot','205');
$peugeot->setMotorisation('diesel');
$peugeot->setNbroues(4);
echo "<hr/>";
//$voiture->changeMarqueVehicule('Audi',$peugeot);
echo $peugeot->getMarque().' '.$peugeot->getMotorisation().' '.$peugeot->getNbroues();
echo "<hr/>";

$voiture->avancer(10)->stop()->redemarrer();

echo "<hr/>";

echo get_class($voiture);

echo "<hr/>";

echo Voiture::class;

echo "<hr/>";
echo $voiture->getMarque().$voiture->getModele();
echo "<hr/>";
$unCamion=new Camion();
$unCamion->setTonnage(18);
$unCamion->setNbroues(6);
$unCamion->setMotorisation("400 CV diesel");
echo $unCamion.' '.$unCamion->getMotorisation().' '.$unCamion->getNbroues().' '.$unCamion->getTonnage();




