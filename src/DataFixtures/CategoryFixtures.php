<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $categoryFile = file_get_contents('data/Category.json', true);
        $categories = json_decode($categoryFile, true);
        foreach ($categories as $elmt) {
            CategoryFactory::createOne($elmt);
        }
    }
}
