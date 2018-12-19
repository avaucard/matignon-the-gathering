<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignUpFormType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/signup", name="SignUpPage")
     */
    public function getSignUpPageView(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(SignUpFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('LogInPage');
        }

        $viewData = [
            'form' => $form->createView()
        ];

        return $this->render('security/sign_up.html.twig', $viewData);
    }


    /**
     * @Route("/login", name="LogInPage")
     */
    public function getLogInPageView()
    {
        return $this->render('security/log_in.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
