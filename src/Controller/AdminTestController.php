<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminTestController extends Controller
{
    /**
     * @Route("/admin/test", name="admin_test")
     */
    public function index()
    {
        return $this->render('admin_test/index.html.twig', [
            'controller_name' => 'AdminTestController',
        ]);
    }
}
