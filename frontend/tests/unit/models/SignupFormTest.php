<?php

namespace frontend\tests\unit\models;

use frontend\tests\fixtures\UserFixture;
use frontend\modules\user\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit {

    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    public function _fixtures() {
        return ['users' => UserFixture::class];
    }

    public function testCorrectSignup() {
        $model = new SignupForm([
            'username' => 'some_username',
            'email' => 'some_email@example.com',
            'password' => 'some_password',
            'nickName' => 'some_nick',
        ]);

        $user = $model->signup();

        expect($user)->isInstanceOf('frontend\models\User');

        expect($user->username)->equals('some_username');
        expect($user->email)->equals('some_email@example.com');
        expect($user->validatePassword('some_password'))->true();
    }

    public function testNotCorrectSignup() {
        $model = new SignupForm([
            'username' => 'Eddard "Ned" Stark',
            'email' => '1@got.com',
            'password' => 'some_password',
            'nickName' => 'Ned',
        ]);
        expect($model->signup())->null();
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));
        expect_that($model->getErrors('nickName'));

        expect($model->getFirstError('username'))
                ->equals('Пользователь с таким именем уже существует.');
        expect($model->getFirstError('email'))
                ->equals('Пользователь с таким почтовым адресом уже зарегистрирован.');
        expect($model->getFirstError('nickName'))
                ->equals('Пользователь с таким ником уже существует.');
    }

}
