<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\Admin\Boat;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class BoatAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('name')
            ->add('length')
            ->add('year')
            ->add('color')
            ->add('createdAt')
            ->add('updatedAt');
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('name')
            ->add('length')
            ->add('year')
            ->add('color','string', ['template' => '/Admin/color_field_list.html.twig'])
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', null, [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ],
            ]);
    }

    protected function configureFormFields(FormMapper $formMapper): void
    {

        $formMapper
            ->add('name')
            ->add('length')
            ->add('year')
            ->add('color',ChoiceType::class, array(
                'choices' => Boat::COLOR_ENUM,
                'choice_label' => function ($choice, $key, $value) {
                   return $value;
                },
            ));

    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('name')
            ->add('length')
            ->add('year')
            ->add('color','string', ['template' => '/Admin/color_field_show.html.twig'])
            ->add('createdAt')
            ->add('updatedAt');

    }
}
