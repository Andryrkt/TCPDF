<?php

namespace App\Controller;

class BadmController extends Controller
{
    public function formBadm()
    {

        $this->twig->display('badm/formCompleBadm.html.twig');
    }

    public function formCompleBadm()
    {
    }
}
