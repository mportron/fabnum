<?php

/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 14/04/17
 * Time: 11:25
 */
class Voiture
{

    private $marque;
    private $modele;

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

    /**
     * @param string $marque
     */
    private function setMarque(string $marque){
        $this->marque=$marque;
    }

    /**
     * @return mixed
     */
    public function getMarque(){
        return $this->marque;
    }

    /**
     * @param $modele
     */
    private function setModele($modele){
        if(is_null($modele)){
            $modele='pas indiqué';
        }
        $this->modele=$modele;
    }

    /**
     * @return mixed
     */
    public function getModele(){
        return $this->modele;
    }

}