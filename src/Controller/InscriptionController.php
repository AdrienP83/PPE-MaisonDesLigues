<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**
 * @IsGranted("ROLE_INSCRIT", statusCode=404, message="Vous n'avez pas les droits necessaires pour accéder à cette page")
 * @Route("/inscription", name="inscription")
 */
class InscriptionController extends AbstractController
{
    /**
     * @Route("/",name="_index")
     */
    public function index() : Response
    {
        return $this->render('inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }
    /**
     * @Route("/modifyemail",name="_modifyEmail",methods={"POST"})
     */
    public function modifyEmail(Request $request) : Response
    {
        $email = get('email');
        if ($request->get('email')){
            $user = $this->getUser();
            $user->setEmail($email);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->redirectToRoute('inscription_index');
    }
}
