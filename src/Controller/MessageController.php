<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\GestionContact;
use App\Entity\Message;
use App\Repository\MessageRepository;
use App\Form\MessageType;

/**
 * @Route("/message", name="message_")
 */
class MessageController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, GestionContact $gestionContact) : Response
    {
        $message = new Message();
        
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            $message = $form->getData();
            
            $gestionContact->envoiMailContact($message);
            
            return $this->redirectToRoute('message_contact');
        }
        
        return $this->render('message/contact.html.twig', [
                    'form' => $form->createView(),
        ]);
    }
}
