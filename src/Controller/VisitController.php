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
        require '../lib/functions.php';

        $visits = get_visits(10);

        $visits = array_reverse($visits);

        $cleverWelcomeMessage = 'Your Health History';
        $visitCount = count($visits);


        if(array_key_exists('id', $_POST)) {
            $id = $_POST['id'];
            deletebutton($id);
        }

        function deletebutton($id) {
            delete_visit($id);
            //return = "This is Button1 that is selected";
            header('Location: /visit_display.php');
            die;
        }





        return $this->render('visits\visits.twig', ['array("visits" => $visits',]);
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