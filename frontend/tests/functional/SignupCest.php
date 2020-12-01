<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest {

    protected $formId = '#login-form';

    public function _before(FunctionalTester $I) {
        $I->amOnRoute('/login');
    }

    public function signupWithEmptyFields(FunctionalTester $I) {
        $I->see('Вход', 'h3');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Необходимо заполнить «Email адрес».');
        $I->seeValidationError('Необходимо заполнить «Пароль».');
    }

    public function signupWithWrongEmail(FunctionalTester $I) {
        $I->submitForm(
                $this->formId, [
            'LoginForm[email]' => 'ttttt',
            'LoginForm[password]' => 'tester_password',
                ]
        );
        $I->dontSee('Необходимо заполнить «Email адрес».', '.help-block');
        $I->dontSee('Необходимо заполнить «Пароль».', '.help-block');
        $I->see('Неверное сочетание email и пароль.', '.help-block');
    }

    public function signupSuccessfully(FunctionalTester $I) {
        $I->submitForm($this->formId, [
            'LoginForm[email]' => 'brady.renner@rutherford.com',
            'LoginForm[password]' => '0',
        ]);
        $I->dontSee('Необходимо заполнить «Password».', '.help-block');
        $I->dontSee('Необходимо заполнить «Email».', '.help-block');

        $I->seeRecord('frontend\models\User', [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
        ]);

        $I->see('Tester', 'div.user-details');
    }

}
