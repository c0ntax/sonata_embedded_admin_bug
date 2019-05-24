<?php

namespace App\Admin;

use App\Entity\Container;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\DataTransformer\BooleanTypeToBooleanTransformer;
use Sonata\CoreBundle\Form\Type\BooleanType;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

final class ContainerAdmin extends AbstractAdmin
{
    public function getNewInstance()
    {
        /** @var Container $container */
        $container = parent::getNewInstance();
        $container->setFlags($this->getChild('admin.flags')->getNewInstance());

        return $container;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('flags');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('flags')
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
                'flags',
                AdminType::class,
                [
                    'label' => 'One Flag, included via AdminType::class',
                    'required' => true,
                    'by_reference' => true,
                    // Unlike all other entities, these embeded OneToOne entities need this and orphanRemoval=true
                    'delete' => false,
                ]
            )
            ->add(
                'flagsCollection',
                CollectionType::class,
                [
                    'label' => 'Many Flags, included via CollectionType::class',
                    'by_reference' => false,
                    'btn_add' => 'Add a Flag',
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'tabs',
                ]
            )
            ->add(
                'subContainerCollection',
                CollectionType::class,
                [
                    'label' => 'Many SubContainers, included via CollectionType::class',
                    'by_reference' => false,
                    'btn_add' => 'Add a SubContainer',
                ],
                [
                    'edit' => 'inline',
                    'inline' => 'tabs',
                ]
            )
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('flags');
    }
}
