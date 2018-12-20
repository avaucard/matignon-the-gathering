<?php

namespace App\Controller;

use App\API\API;
use App\Entity\Politic;
use App\Entity\Collection;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="LogOutHomePage")
     */
    public function getLogOutHomePageView()
    {
        $viewData = [
            'user' => $this->getUser() 
        ];
        return $this->render('main/log_out_home.html.twig', $viewData);
    }

    /**
     * @Route("/home", name="LogInHomePage")
     */
    public function getLogInHomePageView()
    {
        $viewData = [
            'user' => $this->getUser() 
        ];
        return $this->render('main/log_in_home.html.twig', $viewData);
    }

    /**
     * @Route("/summon", name="SummonPage")
     */
    public function getSummonPageView()
    {
        //Create instance of API
        $api = new API();

        //Create Array to Random pick politics
        $politicArray = [];

        //Get Repository
        $repo = $this->getDoctrine()->getRepository(Politic::class);
        $politics = $repo->findAll();

        //Put politics in array depending on rarity
        foreach ($politics as $politic)
        {
            switch ($politic->getRarity()) {
                case 1:
                    for ($i=0; $i < 6; $i++) { 
                        array_push($politicArray, $politic->getId());
                    }
                    break;
                case 2:
                    for ($i=0; $i < 3; $i++) { 
                        array_push($politicArray, $politic->getId());
                    }
                    break;
                case 3:
                    for ($i=0; $i < 1; $i++) { 
                        array_push($politicArray, $politic->getId());
                    }
                    break;
            }
        }

        //Random pick in array
        $summonedPolitic = $politicArray[rand(0,count($politicArray) - 1)];

        //Get politicid matching with random pick
        $repo = $this->getDoctrine()->getRepository(Politic::class);
        $finalPolitic = $repo->find($summonedPolitic);

        //Add random picked politic in database
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $summon = new Collection();
        $summon->setUserid($user);
        $summon->setPoliticid($finalPolitic);

        $entityManager->persist($summon);

        $entityManager->flush();
        
        $viewData = [
            'user' => $this->getUser() 
        ];
        return $this->render('main/summon.html.twig', $viewData);
    }

    /**
     * @Route("/collection", name="CollectionPage")
     */
    public function getCollectionPageView()
    {
        $user = $this->getUser();

        $collection = $user->getCollections();

        $viewData = [
            'collection' => $collection,
            'user' => $this->getUser()
        ];


        return $this->render('main/collection.html.twig', $viewData);
    }

}
