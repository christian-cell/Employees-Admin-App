<?php

namespace App\Controller;
use App\Entity\Employees;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EmployeeRegisterController extends AbstractController
{
    /**
     * @Route("/employee/register", name="employee_register")
     */
    public function index(): Response
    {
        return $this->render('employee_register/index.html.twig', [
            'controller_name' => 'EmployeeRegisterController',
        ]);
    }

    /**
     * @Route("/registerComplited",name="registerCompleted")
     */
    public function createNewUser(Request $request,EntityManagerInterface $doctrine , UserPasswordEncoderInterface $passwordEncoder)
    {
      $employees = new Employees();
      $employees->setNickName($request->get("nickName"));
      $employees->setPassword($passwordEncoder->encodePassword($employees , $request->get("password")));
      $employees->setCredentials($request->get("credentials"));
      $employees->setDepartment($request->get("department"));
      $employees->setSalary($request->get("salary"));
      $employees->setRol($request->get("rol"));

      $doctrine->persist($employees);
      $doctrine->flush();
      
      return $this->render("home/index.html.twig");
    }
}
