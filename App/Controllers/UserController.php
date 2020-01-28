<?php

namespace Application\Controllers;

use Application\Providers\Doctrine;
use Application\Models\Entities\User;
use Application\Providers\View;

class UserController
{
    protected $doctrine;


    //utilizamos un constructor para tener disponible $doctrine en el controlador:
    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;

    }

    public function usuarios(User $users, View $view)
    {

        $users = $this->doctrine->em->getRepository(User::class)->findAll();

        echo $view->render('users.twig', ['users'=>$users]);


//        echo "<pre>";
//        var_dump($users);
//        echo "</pre>";

        \Kint::dump($users);


    }

}
