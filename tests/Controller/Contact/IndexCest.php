<?php

namespace App\Tests\Controller\Contact;

use App\Factory\ContactFactory;
use App\Tests\Support\ControllerTester;
use function Zenstruck\Foundry\faker;

class IndexCest
{
    public function index(ControllerTester $I): void
    {
        ContactFactory::createMany(5);

        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('ul.contacts > li', 5);
        $I->seeNumberOfElements('ul.contacts > li > a', 5);
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

    public function search(ControllerTester $I): void
    {
        ContactFactory::createOne(['firstname' => 'Joe', 'lastname' => 'skufdz']);
        ContactFactory::createOne(['firstname' => 'ale', 'lastname' => 'pkhgf']);
        ContactFactory::createOne(['firstname' => 'jaj', 'lastname' => 'ale']);
        ContactFactory::createOne(['firstname' => 'dcafa', 'lastname' => 'hbtrd']);

        $I->amOnPage('/contact');
        $I->seeResponseCodeIsSuccessful();
        $I->amOnPage('/contact?search=ale');
        $I->seeNumberOfElements(".contact",2);
    }
}
