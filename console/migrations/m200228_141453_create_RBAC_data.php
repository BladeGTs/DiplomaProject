<?php

use yii\db\Migration;
use common\models\User;

/**
 * Class m200228_141453_create_RBAC_data
 */
class m200228_141453_create_RBAC_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $auth = Yii::$app->authManager;
        
        $viewUserListPermissions = $auth->createPermission('viewUserList');
        $auth->add($viewUserListPermissions);
        
        $deleteUserPermissions = $auth->createPermission('deleteUser');
        $auth->add($deleteUserPermissions);
        
        $updateUserPermissions = $auth->createPermission('updateUser');
        $auth->add($updateUserPermissions);
        
        $createProviderPermissions = $auth->createPermission('createProvider');
        $auth->add($createProviderPermissions);

        //Define roles
        
        $moderatorRole = $auth->createRole('moderator');
        $auth->add($moderatorRole);
    
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);
        
        //Define roles - premissions relations
        $auth->addChild($moderatorRole, $createProviderPermissions);
        $auth->addChild($moderatorRole,$viewUserListPermissions);
        
        $auth->addChild($adminRole, $moderatorRole);
        $auth->addChild($adminRole, $deleteUserPermissions);
        $auth->addChild($adminRole, $updateUserPermissions);
        
        //Create admin user
        
        $user = new user([
            'email'=>'admin@admin.com',
            'username'=>'admin',
            'password_hash'=>'$2y$13$Kqk8TomnullBgsruiwk1yOf8aYVY9th0InGILZs2JENm9PtUj7W/6',
        ]);
        $user->generateAuthKey();
        $user->save();
        $auth ->assign($adminRole,$user->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200228_141453_create_RBAC_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200228_141453_create_RBAC_data cannot be reverted.\n";

        return false;
    }
    */
}
