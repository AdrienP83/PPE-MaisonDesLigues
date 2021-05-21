<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AtelierThemeVacationController extends AbstractController
{
    /**
     * @Route("/atelier/theme/vacation", name="atelier_theme_vacation")
     */
    public function index(): Response
    {
        return $this->render('atelier_theme_vacation/index.html.twig', [
            'controller_name' => 'AtelierThemeVacationController',
        ]);
    }
}
