<?php

namespace App\Controller;

use App\Entity\Employees;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class FinderController extends AbstractController
{
    /**
     * @Route("/profile/finderNickname",name="finderNickname")
     */

     public function findEmployeeByNickname (EntityManagerInterface $doctrine)
     {
        $repo = $doctrine->getRepository(Employees::class);
        $nicknames = $repo->findBy(
            [],
            ["nick_name"=>"DESC"]
        );
        return $this->render("employee_register/index.html.twig",['nickname' => $nicknames]);
     }
}
