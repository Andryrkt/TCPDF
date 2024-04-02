<?php

namespace App\Controller;

class BadmController extends Controller
{
    public function formBadm()
    {


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST);
            $this->twig->display('badm/formCompleBadm.html.twig');
        } else {
            $this->twig->display('badm/formBadm.html.twig');
        }
    }

    public function formCompleBadm()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $jsonsata = file_get_contents("php://input");
            $data = json_decode($jsonsata, true);

            if (!empty($data)) {
                $tab = [
                    "message" => $jsonsata
                ];
            } else {
                $tab = [
                    "message" => 'zero données'
                ];
            }


            echo json_encode($tab);
        }
    }
}
