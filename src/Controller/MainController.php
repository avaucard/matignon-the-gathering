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
     * @Route("/home", name="LogInHomePage")
     */
    public function getLogInHomePageView()
    {
        return $this->render('main/log_in_home.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/summon", name="SummonPage")
     */
    public function getSummonPageView()
    {
        return $this->render('main/summon.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/collection", name="CollectionPage")
     */
    public function getCollectionPageView()
    {
        return $this->render('main/collection.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
