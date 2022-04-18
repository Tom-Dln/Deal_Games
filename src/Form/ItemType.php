<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Quel est le titre de votre annonce ?',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description :',
            ])
            ->add('photoFile', VichImageType::class, [
                'label' => 'Photo :',
                'required' => true,
                'allow_delete' => false,
                'download_uri' => false,
            ])
            ->add('category');
            // ->add('category', ChoiceType::class, [
            //     'label' => 'Catégorie :',
            //     'choices' => []
            // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
