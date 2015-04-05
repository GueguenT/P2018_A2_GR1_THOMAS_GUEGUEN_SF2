<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ArticleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content')
            ->add('date',  'date', [
                'years' => range(1900, date('Y')+5),
                'data' => new \DateTime(),
            ])
            ->add('user')
            ->add('category')
            ->add('tag')
            ->add('picture', null, [
                'required' => false,
            ])

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('content')
            ->add('date')
            ->add('user')
            ->add('category')
            ->add('tag')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('date')
            ->add('user')
            ->add('category')
            ->add('tag')
            ->add('_action', 'actions', [
                'actions' => [
                    'show' => [],
                    'edit' => [],
                    'delete' => [],
                ]
            ])
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper){
        $showMapper
            ->add('id')
            ->add('title')
            ->add('content')
            ->add('date')
            ->add('user')
            ->add('category')
            ->add('tag')
            ->add('picture')
        ;

    }
}

