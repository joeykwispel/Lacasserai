<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="Default")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'Hotel' => 'Hotel La Casserai',
        ]);
    }
}
