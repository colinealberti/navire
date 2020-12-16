<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
    
    public function searchBar(){
        $form = $this->createFormbuilder()
                ->setAction($this->generateUrl("search_handlesearch"))
                ->add('cherche', TextType::class)
                ->add('envoiimo', SubmitType::class)
                ->add('envoimmsi', SubmitType::class)
                ->getForm()
        ;
        return $this->render('elements/searchbar.html.twig', [
                    'formSearch' => $form->createView()
        ]);
    }
}
