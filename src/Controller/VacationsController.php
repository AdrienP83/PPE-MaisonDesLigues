<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VacationsController extends AbstractController
{
    /**
     * @Route("/vacations", name="vacations")
     */
    public function index(): Response
    {
        return $this->render('vacations/index.html.twig', [
            'controller_name' => 'VacationsController',
        ]);
    }
}
