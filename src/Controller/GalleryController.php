<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GalleryController extends Controller
{
    /**
     * @Route("/gallery", name="gallery")
     */
    public function indexAction(Request $request)
    {
        $images = [
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
        ];

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $images,
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );

        return $this->render('gallery/index.html.twig', [
            'images' => $pagination,
        ]);
    }
}
