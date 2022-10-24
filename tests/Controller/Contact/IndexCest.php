<?php


namespace App\Tests\Controller\Contact;

use App\Tests\Support\ControllerTester;

class IndexCest
{
    public function index(ControllerTester $I): void
    {
        $I->amOnPage("/contact");
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Liste des contacts');
        $I->see('Liste des contacts', 'h1');
        $I->seeNumberOfElements('li', 195);
        $I->seeNumberOfElements('a', 195);
    }

    public function show(ControllerTester $I): void
    {
        $I->amOnPage("/contact/1");
        $I->seeResponseCodeIsSuccessful();
        $I->seeInTitle('Jacquot Richard');
        $I->see('Jacquot Richard','h1');
    }
}
