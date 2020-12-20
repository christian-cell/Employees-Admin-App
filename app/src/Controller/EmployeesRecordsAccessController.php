<?php

namespace App\Controller;

use App\Entity\Employees;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmployeesRecordsAccessController extends AbstractController
{
    /**
     * @Route("/profile/employees/records/access", name="employees_records_access")
     */
    public function showEmployeesRecords(EntityManagerInterface $doctrine)
    {
        $repo = $doctrine->getRepository(Employees::class);
        $employeesRecords = $repo->findAll();

        return $this->render("employees_records_access/index.html.twig",['employeesRecords'=>$employeesRecords]);
    }
}