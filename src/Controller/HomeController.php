<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $afrika = [
            "night.png",
            "afrika1.jpg",
            "afrika2.jpg",
            "afrika3.jpg",
            "afrika4.jpg",
            "afrika5.png",

        ];

        $asia = [
            "asia1.jpg",
            "asia2.jpg",
            "asia3.jpg",
            "asia4.jpg",
            "asia5.jpg",

        ];

        $europe = [
            "europe1.png",
            "europe2.jpg",
            "europe3.jpg",
            "europe4.jpg",
            "europe5.jpg",

        ];

        $images = array_merge($afrika, $europe, $asia);

        shuffle($images);

        $randomAfirka = array_slice($afrika, 0, 2);
        $randomAsia = array_slice($asia, 0, 2);
        $randomEurope = array_slice($europe, 0, 2);

        $randomImages = array_slice($images, 0, 8);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $randomImages,
            $request->query->getInt('page', 1)/*page number*/,
            6/*limit per page*/
        );


        return $this->render('home/index.html.twig', [
            'randomImages' => $randomImages,
            'randomAfrika' => $randomAfirka,
            'randomAsia' => $randomAsia,
            'randomEurope' => $randomEurope,
            'pagination'   => $pagination
        ]);
    }
}
