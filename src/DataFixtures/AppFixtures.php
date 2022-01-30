<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use App\Entity\Auteurs;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $categorie = new Category();
        $categorie->setName("Catégorie 1");
        $manager->persist($categorie);

        $categorie2 = new Category();
        $categorie2->setName("Biographie");
        $manager->persist($categorie2);
        
        //
        $auteur1 = new Auteurs();
        $auteur1->setNNom("SP");
        //$auteur1->setPrenom("");
        //$auteur1->setDescription();
        //$auteur1->setListeCreations();
        $auteur1->setPseudo("BSP");
        $manager->persist($auteur1);
        
        $auteur2 = new Auteurs();
        $auteur2->setNNom("M");
        $auteur2->setPseudo("TM");
        $manager->persist($auteur2);

        $auteur3 = new Auteurs();
        $auteur3->setNNom("P");
        $auteur3->setPseudo("GP");
        $manager->persist($auteur3);

        $auteur23 = new Auteurs();
        $auteur23->setNNom("M & P");
        $auteur23->setPseudo("TM & GP");
        $manager->persist($auteur23);

        //
        $article = new Article();
        $article->setTitle("Article 1");
        $article->setAuteur("BSP");
        $article->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Ut viverra urna in nunc dapibus tincidunt et eu magna. 
        Pellentesque venenatis varius orci sit amet condimentum. 
        Quisque sit amet enim id nisl consectetur gravida. 
        Curabitur efficitur felis rutrum ligula convallis convallis. 
        Vestibulum eget dictum lorem. 
        Vestibulum est justo, fermentum eu eleifend vestibulum, lacinia efficitur erat. 
        Proin a ligula lorem. In iaculis dignissim sodales.");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie);        
        $article->setTags(["Lorem", "Ipsum"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "25-01-2022"));
        $article->setEtat(true);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Article 2");
        $article->setAuteur("BSP");
        $article->setContent("Morbi viverra facilisis aliquet. ");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie);
        $article->setTags(["Lorem", "Ipsum"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "26-01-2022"));
        $article->setEtat(true);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Tim PATERSON");
        $article->setAuteur("TM & GP");
        //{{ article.content|nl2br }}
        $article->setContent("Tim PATERSON est un programmeur informatique de Microsoft connu pour avoir développé l’OS MS-DOS (Microsoft Disk Operating System) en 1983. 
        
        PATERSON est né en 1956 aux Etats-Unis, il est diplômé en 1987 en informatique dans une université de Washington et travaillait en parallèle comme technicien de réparation. Après l’obtention de son diplôme il travaille pour Seattle Computer Products en tant que \"software engineer\" et conçoit du matériel informatique pour Microsoft et des cartes et logiciels compatibles avec les processeurs Intel. 
        
        C’est en 1980 qu’il devient connu pour la première fois avec la création du Quick and Dirty Operating System qui sera renommé le 86-DOS. Le 86-DOS permet de combler un vide dans le marché de l’informatique, car les OS disponibles n’étaient plus compatibles avec les nouvelles CPU. En fin d’année 1980, Microsoft achète les droits du 86-DOS pour devenir son seul fabricant. 
        
        En 1981, PATERSON commence à travailler chez Microsoft avant de les quitter pour créer son entreprise Falcon Technology, qui sera rachetée par Microsoft en 1986. Entre temps, en 1984, PARTERSON travaille pour Microsoft sur le portage du MS-DOS sous la norme MSX et sur le projet de création du MSX-DOS. 
        
        Il travaillera sur le développement du logiciel Visual Basic mais finira par quitter à nouveau Microsoft en 1998 et créera sa seconde entreprise : Paterson Technologie. 
        
        Par la suite on le retrouvera dans quelques émissions de télévision, puis dans le rallye SCCA PRO Rally. Enfin, il fera parler de lui pour avoir créé un ordinateur de bord qu’il intégra dans une Porsche 911, 4 roues motrices.
        ");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie2);
        $article->setTags(["TIM", "PATERSON", "MICROSOFT"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "27-01-2022"));
        $article->setEtat(true);
        $manager->persist($article);


        $article = new Article();
        $article->setTitle("Tim PATERSON Rally");
        $article->setAuteur("TM & GP");
        //{{ article.content|nl2br }}
        $article->setContent("
        (Ses victoires :
        Rotary Rally Rockets : 1984 Tim Paterson et Douglas Paterson avec une Mazda RX7,
        SCCA PRO Rally : 1989 Tim Paterson et Penny Thomas avec une Porsche 911).
        ");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie2);
        $article->setTags(["TIM", "PATERSON", "RALLY"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "27-01-2022"));
        $article->setEtat(true);
        $manager->persist($article);


        //articles non publies

        $article = new Article();
        $article->setTitle("Essaie");
        $article->setAuteur("GP");
        $article->setContent("Morbi viverra facilisis aliquet. ");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie);
        $article->setTags(["Lorem", "Ipsum"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "30-01-2022"));
        $article->setEtat(false);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Test");
        $article->setAuteur("TM");
        $article->setContent("Morbi viverra facilisis aliquet. ");
        $contenu = $article->getContent(); 
        $resum = substr($contenu, 0, 50);
        $article->setResume($resum);
        $article->setCategory($categorie);
        $article->setTags(["Lorem", "Ipsum"]);
        $article->setDate(\DateTime::createFromFormat('d-m-Y', "30-01-2022"));
        $article->setEtat(false);
        $manager->persist($article);

        //users
        $Tiff = new User();
        $Tiff->setUsername("Tiff");
        $Tiff->setPassword("mdpT");
        $manager->persist($Tiff);

        $Gabrielle = new User();
        $Gabrielle->setUsername("Gabrielle");
        $Gabrielle->setPassword("mdpG");
        $manager->persist($Gabrielle);

        $manager->flush();
    }
}