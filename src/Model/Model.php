<?php

namespace App\Model;

class Model
{
    protected $connexion;

    public function __construct()
    {
        $this->connexion = new Connexion();
    }


    public function RecupereNumDom($colonne)
    {
        $NumDOM_Max = "SELECT  MAX(Numero_Ordre_Mission) FROM Demande_ordre_mission ";
        $exec_NumDOM_Max = $this->connexion->query($NumDOM_Max);
        if ($exec_NumDOM_Max === null) {
            echo "null";
        }
        odbc_fetch_row($exec_NumDOM_Max);
        return  odbc_result($exec_NumDOM_Max, $colonne);
    }
}
