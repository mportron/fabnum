<?php

/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 14/04/17
 * Time: 11:25
 */
class Voiture extends Vehicule
{
    /**
     * Voiture constructor.
     * @param string $marque
     * @param null $modele
     */
    function __construct(string $marque, $modele=null)
    {
        $this->setMarque($marque);
        $this->setModele($modele);
    }

    function __toString()
    {
        return "je suis une voiture de la marque ".$this->getMarque().' '.$this->getModele();
    }
}