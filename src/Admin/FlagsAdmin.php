<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class FlagsAdmin extends AbstractAdmin
{

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('test');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('test')
            ->add(
                '_action',
                null,
                [
                    'actions' => [
                        'show' => [],
                        'edit' => [],
                        'delete' => [],
                    ],
                ]
            );
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'test',
                ChoiceType::class,
                [
                    'expanded' => true,
                    'multiple' => false,
                    'label' => 'Yes or no!',
                    'help' => 'This should have defaulted to yes!',
                    'choices' => ['Yes' => BooleanType::TYPE_YES, 'No' => BooleanType::TYPE_NO],
                ]

            )
            ->add(
                'string'
            );
        $formMapper->get('test')->addModelTransformer(new BooleanTypeToBooleanTransformer());
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('test');
    }
}
