<?php

/**
 * Created by PhpStorm.
 * User: patjoub
 * Date: 15/04/17
 * Time: 12:50
 */
class Camion extends Vehicule
{
    private $tonnage;

    public function __construct()
    {
    }

    function __toString()
    {
        return "<br/>je suis un camion<br/>";
    }

    /**
     * @param mixed $tonnage
     */
    public function setTonnage($tonnage)
    {
        $this->tonnage = $tonnage;
    }

    /**
     * @return mixed
     */
    public function getTonnage()
    {
        return $this->tonnage.' Tonnes';
    }
}