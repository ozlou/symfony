<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use App\Form\GetmailType;
use App\Entity\PasswordRecovery;

class PasswordRecoveryController extends AbstractController
{   
    
    #[Route('/password/recovery', name: 'app_password_recovery')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $passwordRecovery = new PasswordRecovery();
        $form = $this->createForm(GetmailType::class, $passwordRecovery);
        $form->handleRequest($request);
        if ($form->isSubmitted()&& $form->isValid()){
            $email = (new Email())
            ->from('admin@ynov.com')
            ->to('ozlem.can@ynov.com')  
            ->subject('Aide sur le mot de passe')
            ->text('Pour vérifier votre identité, veuillez utiliser le code suivant :
                557524
                Ne partagez ce mot de passe avec personne. Notre service client ne vous demandera jamais votre mot de passe, vos informations bancaires.
                Nous espérons vous revoir bientôt.');
    
            $mailer->send($email);

            return $this->redirectToRoute('app_password_recovery');
        }
        return $this->renderForm('password_recovery/index.html.twig', [
            'form' => $form
        ]);
    }
}
