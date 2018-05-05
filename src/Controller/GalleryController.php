<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function index()
    {
        return $this->render('gallery/index.html.twig', [
            'images' => [
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
                'night.png',
            ]
        ]);
    }
}
