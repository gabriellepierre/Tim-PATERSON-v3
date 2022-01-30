<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Form\SearchForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    
    #[Route('/search', name: 'recherche' , methods: ['Post'])]
    public function SearchRecherche()
    {
        return $this->render('search/recherche.php');
    }
    

    //https://www.citizenz.info/article/symfony-barre-de-recherche-dans-la-sidebar
    
    #[Route('/search', name: 'search')]     
    public function rechercheController(Request $request, ArticleRepository $articleRepository)
    {
        /*$form = $this->createFormBuilder()
            ->setAction($this->generateUrl('handleSearch'))
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un mot-clé'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);*/

        $rechArticles = [];

        $searchForm = $this->createForm(SearchForm::class);

        if($searchForm->handleRequest($request)->isSubmitted() && $searchForm->isValid()) {
            $critere = $searchForm->getData();
            dd($critere);
            $rechArticles = $articleRepository->rechercheArticle($critere);
        }
        //  
        return $this->render('search/searchBar.html.twig', [
            'search_form' => $searchForm->createView(),
            'rechArticles' => $rechArticles,
        ]);
    }


}
