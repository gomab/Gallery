<?php
/**
 * Created by PhpStorm.
 * User: gomab
 * Date: 5/5/18
 * Time: 10:31 AM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends Controller
{
    public function testAction(){
        $post = [
            'id' => 1,
            'title' => 'My title',
            'content' => 'My content'
        ];

        dump($post);
        return new Response('<html><body>HELLO WORD !!</body></html>');
    }

    /**
     * @Route("/contactTest/{slug}", name="contact-test")
     * @return Response
     */
    public function contactTestAction($slug){
        $post = new \stdClass();
        $post->title = 'My Title';
        $post->content = 'My Content';
        return $this->render('test/contact.html.twig', [
            'post' => $post,
            'slug'   => $slug
        ]);
    }
}