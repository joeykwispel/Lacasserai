<?php

namespace App\Controller;

use App\Entity\Kamer;
use App\Form\KamerType;
use App\Repository\KamerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Default")
     */
    public function index(KamerRepository $kamerRepository)
    {
        return $this->render('home/index.html.twig', [
            'Hotel' => 'Hotel La Casserai',
            'kamers' => $kamerRepository->findAll(),

        ]);
    }
}
