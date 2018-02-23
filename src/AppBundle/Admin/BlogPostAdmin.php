<?php
/**
 * Created by PhpStorm.
 * User: adrabysheuski
 * Date: 2/23/18
 * Time: 6:02 PM
 */

namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Content', ['class' => 'col-md-9'])
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->end()
            ->with('Meta data', ['class' => 'col-md-3'])
            ->add('category', 'sonata_type_model', [
                'class'    => 'AppBundle\Entity\Category',
                'property' => 'name',
            ])
            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category.name')
            ->add('draft')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('category', null, [], 'entity', [
                'class'    => 'AppBundle\Entity\Category',
                'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            ])
        ;
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}
