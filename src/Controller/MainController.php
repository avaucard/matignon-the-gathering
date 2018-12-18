<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="LogOutHomePage")
     */
    public function getLogOutHomePageView()
    {
        return $this->render('main/log_out_home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/signup", name="SignUpPage")
     */
    public function getSignUpPageView()
    {
        return $this->render('main/sign_up.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/login", name="LogInPage")
     */
    public function getLogInPageView()
    {
        return $this->render('main/log_in.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/home", name="LogInHomePage")
     */
    public function getLogInHomePageView()
    {
        return $this->render('main/log_in_home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
