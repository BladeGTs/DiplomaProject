<?php
namespace frontend\tests\models;
use frontend\tests\fixtures\UserFixture;
use yii\web\User;
use Codeception\Test\Unit;
use frontend\modules\user\models\LoginForm;


class LoginTest extends Unit
{
    protected const USER_EMAIL = '1@got.com';
    protected const USER_PASSWORD = '111111';
    protected const USER_PASSWORD_HASH = '$2y$13$VX0j9hAltNE54K6dKAi2GOjkBiw.CmN021GvPkqI3v0negF1eH.CK';

    protected static $_storedEntities = [
        'user' => null,
    ];

    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;


    /**
     * Use user fixtures for database testing
     */
    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testValidationIsTrue()
    {
        $loginForm = new LoginForm([
            'email' => self::USER_EMAIL,
            'password' => '111111',
        ]);
        $this->assertTrue($loginForm->validate());
    }

    public function testAuthorizationCall()
    {
        $mock = $this->getMockBuilder(User::class)
            ->setMethods(['login'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->method('login')->withAnyParameters()->willReturn(true);
        \yii::$app->set('user', $mock);
        $loginForm = new LoginForm([
            'email' => self::USER_EMAIL,
            'password' => self::USER_PASSWORD,
        ]);
        $this->assertTrue($loginForm->login());
    }

    public function testTestUserExists()
    {
        $user = \frontend\models\User::findByEmail(self::USER_EMAIL);
        $this->assertNotEmpty($user);
    }

    public function testTest1UserNotExists()
    {
        $user = \frontend\models\User::findByEmail('test1@test.test');
        $this->assertEmpty($user);
    }

    public function testTest2UserExists()
    {
        $user = \frontend\models\User::findByEmail('brady.renner@rutherford.com');
        $this->assertNotEmpty($user);
    }

    public function testTestUserLogin()
    {
        $mock = $this->getMockBuilder(User::class)
            ->setMethods(['login'])
            ->disableOriginalConstructor()
            ->getMock();
        $mock->method('login')->withAnyParameters()->willReturn(true);
        \Yii::$app->set('user', $mock);
        $loginForm = new LoginForm();
        $loginForm->load(['LoginForm' => ['email' => static::USER_EMAIL, 'password' => static::USER_PASSWORD]]);
        $this->assertTrue($loginForm->login());
    }
}
