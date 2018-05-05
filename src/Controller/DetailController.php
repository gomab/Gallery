<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DetailController extends Controller
{
    /**
     * @Route("/detail", name="detail")
     */
    public function indexAction()
    {
        $image = 'night.png';

        return $this->render('detail/index.html.twig', [
            'image' => $image,
        ]);
    }
}
