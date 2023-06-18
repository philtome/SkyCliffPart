<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Loader\ArrayLoader;

class VisitController
{
    #[Route('/')]
    public function homepage () {
        return new Response('this is home');
    }

    #[Route('/visits')]
    public function visits (): Response {


        $loader = new ArrayLoader([
            'index' => 'Hello {{ name }}!',
        ]);
        $twig = new \Twig\Environment($loader);
        return new Response($twig->render('index', ['name' => 'Fabien']));

    }

    #[Route('/contacts/{slug}')]
    public function contacts ($slug): Response {
        return new Response('This is the contacts plus slugs page, slug: '.$slug);
    }
}