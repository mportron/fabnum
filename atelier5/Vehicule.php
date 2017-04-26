<?php

/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 15/04/17
 * Time: 12:40
 */
class Vehicule
{
    protected $marque;
    protected $modele;
    protected $nbroues;
    protected  $motorisation;

    public function __construct()
    {
    }

    function __toString()
    {
        return "je suis un véhicule";
    }
    /**
     * @param string $marque
     */
    protected function setMarque(string $marque){
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
    protected function setModele($modele){
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


    public function avancer(int $distance){
        echo "on avance de ".$distance." metres....";
        return $this;
    }

    public function stop(){
        echo "on s'arrête....";
        return $this;
    }

    public function redemarrer(){
        echo "on redémarre....";
        return $this;
    }

    /**
     * @param mixed $motorisation
     */
    public function setMotorisation($motorisation)
    {
        $this->motorisation = $motorisation;
    }

    /**
     * @return mixed
     */
    public function getMotorisation()
    {
        return $this->motorisation;
    }

    /**
     * @param mixed $nbroues
     */
    public function setNbroues($nbroues)
    {
        $this->nbroues = $nbroues;
    }



    /**
     * @return mixed
     */
    public function getNbroues()
    {
        return $this->nbroues.' roues';
    }

}