<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Tests\Support\ControllerTester;

class IndexCest
{
    public function index(ControllerTester $I): void
    {
        ContactFactory::createMany(5);

        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('li', 5);
        $I->seeNumberOfElements('a', 5);
    }

    public function show(ControllerTester $I): void
    {
        ContactFactory::createOne(['firstname' => 'Joe', 'lastname' => 'Aaaaaaaaaaaaaaa']);
        $I->amOnPage('/contact/1');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Aaaaaaaaaaaaaaa Joe');
        $I->see('Aaaaaaaaaaaaaaa Joe', 'h1');
        $I->seeCurrentRouteIs('app_contact_show', ['id' => 1]);
    }
}
