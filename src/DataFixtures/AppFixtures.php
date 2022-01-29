<?php

namespace App\DataFixtures;

use App\Entity\Article;
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

        $article = new Article();
        $article->setTitle("Article 1");
        $article->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut viverra urna in nunc dapibus tincidunt et eu magna. Pellentesque venenatis varius orci sit amet condimentum. Quisque sit amet enim id nisl consectetur gravida. Curabitur efficitur felis rutrum ligula convallis convallis. Vestibulum eget dictum lorem. Vestibulum est justo, fermentum eu eleifend vestibulum, lacinia efficitur erat. Proin a ligula lorem. In iaculis dignissim sodales.");
        $article->setCategory($categorie);
        $manager->persist($article);

        $article = new Article();
        $article->setTitle("Article 2");
        $article->setContent("Morbi viverra facilisis aliquet. Phasellus suscipit arcu id felis tempor, in fringilla turpis dictum. Fusce porta finibus diam, vitae lacinia nibh finibus id. Donec facilisis nisl quis egestas sollicitudin. Aenean quis nulla est. Aliquam volutpat dolor eget ultricies maximus. Maecenas felis turpis, lacinia et purus in, viverra sagittis ex. Ut laoreet est sit amet ligula auctor, in venenatis magna interdum. Maecenas suscipit accumsan libero, auctor ullamcorper lectus porta semper.");
        $article->setCategory($categorie);
        $manager->persist($article);

        $articleT = new Article();
        $articleT->setTitle("Tim PATERSON");
        //{{ article.content|nl2br }}
        $articleT->setContent("Tim PATERSON est un programmeur informatique de Microsoft connu pour avoir développé l’OS MS-DOS (Microsoft Disk Operating System) en 1983. 
        
        PATERSON est né en 1956 aux Etats-Unis, il est diplômé en 1987 en informatique dans une université de Washington et travaillait en parallèle comme technicien de réparation. Après l’obtention de son diplôme il travaille pour Seattle Computer Products en tant que \"software engineer\" et conçoit du matériel informatique pour Microsoft et des cartes et logiciels compatibles avec les processeurs Intel. 
        
        C’est en 1980 qu’il devient connu pour la première fois avec la création du Quick and Dirty Operating System qui sera renommé le 86-DOS. Le 86-DOS permet de combler un vide dans le marché de l’informatique, car les OS disponibles n’étaient plus compatibles avec les nouvelles CPU. En fin d’année 1980, Microsoft achète les droits du 86-DOS pour devenir son seul fabricant. 
        
        En 1981, PATERSON commence à travailler chez Microsoft avant de les quitter pour créer son entreprise Falcon Technology, qui sera rachetée par Microsoft en 1986. Entre temps, en 1984, PARTERSON travaille pour Microsoft sur le portage du MS-DOS sous la norme MSX et sur le projet de création du MSX-DOS. 
        
        Il travaillera sur le développement du logiciel Visual Basic mais finira par quitter à nouveau Microsoft en 1998 et créera sa seconde entreprise : Paterson Technologie. 
        
        Par la suite on le retrouvera dans quelques émissions de télévision, puis dans le rallye SCCA PRO Rally. Enfin, il fera parler de lui pour avoir créé un ordinateur de bord qu’il intégra dans une Porsche 911, 4 roues motrices. 
        
        (Ses victoires :
        Rotary Rally Rockets : 1984 Tim Paterson et Douglas Paterson avec une Mazda RX7,
        SCCA PRO Rally : 1989 Tim Paterson et Penny Thomas avec une Porsche 911).
        ");
        $articleT->setCategory($categorie2);
        $articleT->setTags(["TIM", "PATERSON", "MICROSOFT"]);
        $articleT->setDate(\DateTime::createFromFormat('d-m-Y', "27-01-2022"));
        $articleT->setEtat(true);
        $manager->persist($articleT);

        $manager->flush();
    }
}
