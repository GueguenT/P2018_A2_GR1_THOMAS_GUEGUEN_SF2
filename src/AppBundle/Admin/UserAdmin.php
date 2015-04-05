<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 02/04/15
 * Time: 14:56
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends Admin{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper
            ->add('firstName')
            ->add('lastName')
            ->add('birthday', 'birthday', [
                'years' => range(date('Y')-90, date('Y')),
            ])
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('lastName')
            ->add('firstName')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('lastName')
            ->add('firstName')
            ->add('birthday')
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
            ->add('lastName')
            ->add('firstName')
            ->add('birthday')
        ;

    }
} 