<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\NavireRepository;

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
    
    /**
     * @Route("/search_handlesearch", name="search_handlesearch")
     */
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
    
    /**
     * @Route("/search/handlesearch", name="search_handlesearch")
     * 
     * @param Request $request
     * @param NavireRepository $repo
     * @return Response
     */
    public function handleSearch(Request $request, NavireRepository $repo): Response{
        $valeur = $request->request->get('form')['cherche'];
        if (isset($request->request->get('form')['envoiimo'])){
            
            $critere = "imo recherché : " . $valeur;
        }else{
            
            $critere = "mmsi recherché " . $valeur;
        }
            return new Response("<h1> $critere </h1>");
    }
}
