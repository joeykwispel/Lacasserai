<?php

namespace App\Controller;

use App\Entity\Kamer;
use App\Form\KamerType;
use App\Repository\KamerRepository;
use App\Entity\Image;
use App\Form\ImageType;
use App\Repository\ImageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Default")
     */
    public function index(KamerRepository $kamerRepository, ImageRepository $imageRepository)
    {
        return $this->render('home/index.html.twig', [
            'Hotel' => 'Hotel La Casserai',
            'kamers' => $kamerRepository->findAll(),
            'images' => $imageRepository->findAll(),
        ]);
    }
}
