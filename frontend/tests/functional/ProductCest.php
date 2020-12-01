<?php

namespace frontend\tests\functional;
use frontend\tests\fixtures\UserFixture;
use frontend\tests\FunctionalTester;

class proudctCest {

    protected $formId = "#form-enter";

    public function _fixtures() {
        return [
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ]
        ];
    }

    public function _before(FunctionalTester $I) {
        $I->amOnRoute('/product/create');
    }
        protected function formParams($email, $password)
    {
        return [
            'LoginForm[email]' => $email,
            'LoginForm[password]' => $password,
        ];
    }

    // tests
    public function EnterValidData(FunctionalTester $I) {
        $I->see('Вход');
        $I->submitForm('#login-form', $this->formParams('sfriesen@jenkins.info', 'password_0'));
        $I->see('erau', 'div.user-details');
        $I->click('Действия с базой');
        $I->click('Товары');
        $I->click('Добавить товар');
        $I->see('Добавить товар', 'h1');
        $I->submitForm(
                $this->formId, [
            'Product[barcode]"' => '2135154',
            'Product[Name]' => 'name_test',
            'Product[Product_group]' => 'group_test',
            'Product[Units]' => 'test_uinits',
            'Product[Manufacturer_Name]' => 'tester',
            'Product[Country_of_Origin]' => 'tester',
                ]
        );
        $I->see('name_test');
    }
        public function EnterWrongData(FunctionalTester $I) {
        $I->see('Вход');
        $I->submitForm('#login-form', $this->formParams('sfriesen@jenkins.info', 'password_0'));
        $I->see('erau', 'div.user-details');
        $I->click('Действия с базой');
        $I->click('Товары');
        $I->see('Товары');
        $I->click('Добавить товар');
        $I->see('Добавить товар', 'h1');
        $I->submitForm(
                $this->formId, [
            'Product[barcode]"' => 'text',
            'Product[Name]' => 'name_test',
            'Product[Product_group]' => 'group_test',
            'Product[Units]' => 'test_uinits',
            'Product[Manufacturer_Name]' => 'tester',
            'Product[Country_of_Origin]' => 'tester',
                ]
        );
        $I->see('Значение «Штрих-код» должно быть числом.');
    }
    

}
