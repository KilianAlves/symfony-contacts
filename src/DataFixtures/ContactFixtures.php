<?php

namespace App\DataFixtures;

use App\Factory\CategoryFactory;
use App\Factory\ContactFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use function Zenstruck\Foundry\faker;

class ContactFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        ContactFactory::createMany(150, function() {
            if (faker()->boolean(90)) {
                return [
                    'category' => CategoryFactory::random(),
                ];
            } else {
                return [
                ];
            }
        });
        //ContactFactory::createOne(['category' => CategoryFactory::random()]);
//
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
