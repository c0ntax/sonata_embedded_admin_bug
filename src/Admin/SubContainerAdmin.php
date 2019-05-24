<?php

declare(strict_types=1);

namespace App\Admin;

use App\Entity\SubContainer;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\AdminType;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;

final class SubContainerAdmin extends AbstractAdmin
{
    public function getNewInstance()
    {
        /** @var SubContainer $subContainer */
        $subContainer = parent::getNewInstance();
        $subContainer->setFlags($this->getChild('admin.flags')->getNewInstance());
        return $subContainer;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('id')
            ;
    }

    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->add('id')
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
            ;
    }

    protected function configureShowFields(ShowMapper $showMapper): void
    {
        $showMapper
            ->add('id')
            ;
    }
}
