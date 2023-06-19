<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Loader\ArrayLoader;
use Twig\Loader\FilesystemLoader;

class VisitController extends AbstractController
{
    #[Route('/')]
    public function homepage () {
        return new Response('this is home');
    }

    #[Route('/visits')]
    public function visits (): Response {


//        $loader = new ArrayLoader([
//            'index' => 'Hello {{ name }}!',
//        ]);
        $loader = new FilesystemLoader('views');
        $twig = new \Twig\Environment($loader);
        return new Response($twig->render('visits.twig', ['name' => 'Mr Tome']));

    }

    #[Route('/contacts/{slug}')]
    public function contacts ($slug): Response {
        return new Response('This is the contacts plus slugs page, slug: '.$slug);
    }
}