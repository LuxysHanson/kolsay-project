<?php

use yii\db\Migration;

/**
 * Class m220513_112348_add_default_admin
 */
class m220513_112348_add_default_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = new \common\models\User();
        $user->email = 'admin@admin.kz';
        $user->username = 'admin@admin.kz';
        $user->first_name = 'Админ';
        $user->last_name = 'Админов';
        $user->system_role = \common\models\User::ROLE_SUPER_ADMIN;
        $user->setPassword('123456789');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

    }

    /**
     * {@inheritdoc}
     * @throws \yii\db\StaleObjectException
     */
    public function safeDown()
    {
        $user = \common\models\User::find()->where(['email' => 'admin@admin.kz'])->one();
        if ($user){
            return $user->delete();
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220513_112348_add_default_admin cannot be reverted.\n";

        return false;
    }
    */
}
