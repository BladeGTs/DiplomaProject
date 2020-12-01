<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;
use common\fixtures\UserFixture;

class LoginCest
{
     /**
      * Load fixtures before db transaction begin
      * Called in _before()
      * @see \Codeception\Module\Yii2::_before()
      * @see \Codeception\Module\Yii2::loadFixtures()
      * @return array
      */
    public function _fixtures()
    {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('user/default/login');
    }

    protected function formParams($email, $password)
    {
        return [
            'LoginForm[email]' => $email,
            'LoginForm[password]' => $password,
        ];
    }

    public function checkEmpty(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('', ''));
        $I->seeValidationError('Необходимо заполнить «Email адрес».');
        $I->seeValidationError('Необходимо заполнить «Пароль».');
    }

    public function checkWrongPassword(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('admin', 'wrong'));
        $I->seeValidationError('Неверное сочетание email и пароль.');
    }
    
    public function checkValidLogin(FunctionalTester $I)
    {
        $I->submitForm('#login-form', $this->formParams('sfriesen@jenkins.info', 'password_0'));
        $I->see('erau', 'div.user-details');
        $I->dontSeeLink('Регистрация');
    }
}
