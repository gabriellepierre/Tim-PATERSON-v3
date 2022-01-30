<?php


namespace App\Form;

use App\Entity\Article;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchForm extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Article', EntityType::class, [
            'class' => Article::class,
            'choice_label' => 'title'
        ]);
        ;
    }
}
 //tuto :https://www.youtube.com/watch?v=_75fDJITerA&ab_channel=SmaineMilianni
/*->add('title', Article::class, [
                'class' => title::class,
                'choice_label' => 'name'
                ]*/
?>