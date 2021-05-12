<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UsersController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted()){
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            //Guardar usuario en BD
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('vehiculos');
        }

        return $this->render('users_controllers/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('users_controllers/login.html.twig', array(
            'error' => $error,
            'last_username' => $lastUsername
        ));
    }
}
