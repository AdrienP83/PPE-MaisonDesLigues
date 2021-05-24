<?php

namespace App\Controller;

use App\Entity\Atelier;
use App\Form\AtelierType;
use App\Repository\AtelierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
    
/**
 * @IsGranted("ROLE_USER", statusCode=404, message="Vous n'avez pas les droits necessaires pour accéder à cette page")
 * @Route("/atelier")
 */
class AtelierController extends AbstractController
{
    /**
     * @Route("/", name="atelier_index", methods={"GET"})
     */
    public function index(AtelierRepository $atelier): Response
    {
        return $this->render('atelier/index.html.twig', [
            'ateliers' => $atelier->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ajout_atelier")
     */
    public function new(Request $request)
    {   $atelier = new Atelier();
        $form = $this->createForm(AtelierType::class, $atelier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($atelier);
            $entityManager->flush();

            return $this->redirectToRoute('aterlier_index');
        }

        return $this->render('atelier/new.html.twig', [
            'aterlier' => $atelier,
            'form' => $form->createView(),
        ]);
    }
}
