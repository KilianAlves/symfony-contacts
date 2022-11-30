<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\ContactFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        CategoryFactory::createOne(['name' => 'truc']);
        //$manager->flush();
    }

    public function getDependencies()
    {
        return [
            ContactFactory::class,
        ];
    }
}
