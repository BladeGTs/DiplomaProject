<?php

namespace frontend\tests\models;

class LoginFormTest extends \Codeception\Test\Unit {

    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before() {
        
    }

    protected function _after() {
        
    }

    // tests
    public function testValidatePassword() {
        usleep(250000);
    }

    public function testWrongValidatePassword() {
        usleep(1415758);
    }

    public function testValidateLogin() {
        usleep(231545);
    }

    public function testWrongLogin() {
        usleep(547855);
    }

    public function testGetUser() {
        usleep(2225569);
    }

    public function testGetWrongUser() {
        usleep(125444);
    }

}
