<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Form\CompteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CompteController extends AbstractController
{
     /**
     * @Route("/inscription", name="security_registration")
     */
    public function Registration(Request $request, EntityManagerInterface $manager,
            UserPasswordEncoderInterface $encoder):Response {
        $compte = new Compte();
        //relie les champs du formulaire avec ceux de l'utilisateur
        $form = $this->createForm(CompteType::class, $compte);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($compte, $compte->getPassword());

            $compte->setPassword($hash);
            $manager->persist($compte);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }

        return $this->render('compte/inscription.html.twig', [
                    'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/connexion", name="security_login")
     */
    public function login()
    {
        $this->addFlash(
            'notice',
            'Invalid name entered'
        );
        return $this->render('compte/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout()
    {
    }
}
