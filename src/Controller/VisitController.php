<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Loader\FilesystemLoader;

class VisitController extends AbstractController
{
    #[Route('/')]
    public function homepage () {
        return $this->render('main\home.twig', ['userName' => 'Philip Tome']);
    }

    #[Route('/visits')]
    public function visits (): Response
    {
        return $this->render('visits\visits.twig', ['name' => 'Mr Tome 2 u']);
    }

    #[Route('/contacts')]
    public function contacts (): Response {
            return $this->render('contacts\contacts.twig', ['name' => 'Mr Tome 2 u']);
    }

    #[Route('/about')]
    public function about (): Response {
        return $this->render('contacts\about.twig', ['name' => 'Mr Tome 2 u']);
    }

    // note I need to figure out below: name and methods
    #[Route('/individualContact/{slug}', name:'contacts.twig', defaults: ['slug' => null], methods: ['GET', 'HEAD'])]
    public function individualContact ($slug): Response {
        return new Response('This is the Individual Contacts plus slugs page, slug: '.$slug);
    }

}