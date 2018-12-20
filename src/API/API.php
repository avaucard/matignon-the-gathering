<?php 

namespace App\API;

use App\Entity\Collection;
use App\Entity\Politic;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class API {
    
    public function addNewPolitic($name, $party, $image, $rarity)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $politic = new Politic();
        $politic->setName($name);
        $politic->setParty($party);
        $politic->setImage($image);
        $politic->setRarity($rarity);

        $entityManager->persist($politic);

        $entityManager->flush();
    }

    public function addNewUser($surname, $firstname, $email, $password)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setSurname($surname);
        $user->setFirstname($firstname);
        $user->setEmail($email);
        $user->setPassword($password);

        $entityManager->persist($user);

        $entityManager->flush();
    }

    public function getCurrentUser(User $user)
    {
        $userId = $user->getId();
        
        return $userId;
    }

    public function summonPolitic() 
    {

    }


}
?>