<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VisitController
{
    #[Route('/')]
    public function homepage () {
        return new Response('this is home');
    }

    #[Route('/visits')]
    public function visits (): Response {
        return new Response('This is the visits page');
    }

    #[Route('/contacts/{slug}')]
    public function contacts ($slug): Response {
        return new Response('This is the contacts plus slugs page, slug: '.$slug);
    }
}