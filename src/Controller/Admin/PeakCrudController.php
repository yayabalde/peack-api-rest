<?php

namespace App\Controller\Admin;

use App\Entity\Peak;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class PeakCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Peak::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Name')->setRequired(true)->setColumns('col-md-6');
        yield NumberField::new('altitude', 'Altitude')->setRequired(true)->setColumns('col-md-6');
        yield NumberField::new('lat', 'Latitude')->setStoredAsString()->setRequired(true)->setColumns('col-md-6');
        yield NumberField::new('lon', 'longitude')->setStoredAsString()->setRequired(true)->setColumns('col-md-6');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setSearchFields(['name', 'altitude', 'lat', 'lon' ])
            ->setPaginatorPageSize(50)
            ->setDefaultSort([
                'id' => 'DESC',
            ])
            ;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('name')
            ->add('altitude')
            ->add('lat')
            ->add('lon')
            ;
    }

}
