<?php 

namespace App\Controller;

use App\Entity\Collection;
use App\Entity\Politic;
use App\Entity\User;

class API {
    public function showCollection()
    {
        $repo = $this->getDoctrine()->getRepository(Collection::class);
        $artists = $repo->findAll();
        $viewData = ['artists' => $artists];
        return $viewData;
    }

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
}
?>