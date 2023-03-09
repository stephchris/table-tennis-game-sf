<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('email'),
            TextField::new('password'),
            TextField::new('roles'),
            TextField::new('firstName'),
            TextField::new('gender'),
            TextField::new('birthDate'),
            TextField::new('lastName'),
            TextField::new('address'),
            TextField::new('zipcode'),
            TextField::new('city'),
            ImageField::new('ranking'),
            ImageField::new('image')->setUploadDir('/public/uploads')->setBasePath('uploads')


        ];
    }

}
