<?php
/**
 * Created by PhpStorm.
 * User: Rikipm
 * Date: 15.07.2019
 * Time: 17:32
 */

class UserControllerCest
{

    public function _before(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
    }

    public function createUser(\FunctionalTester $I)
    {
        $I->amOnRoute('user');

        $I->comment('Click "Create user" button');

        $I->see('Create user');
        $I->click('Create user');

        $I->seeCurrentUrlEqualsTestPrefix('/user/create');

        $I->fillField('Username', 'create_new_user_test');
        $I->fillField('Password', 'password');
        $I->click('Save');

        $I->seeCurrentUrlMatches('/index-test\.php\/user\/update\?id=\d+/'); //This regex check that URI equal to " /index-test.php/user/update?id=*ANY_NUMBER_HERE* "
        $I->see('Update user: create_new_user_test');
    }

    public function updateUser(\FunctionalTester $I)
    {
        $I->comment('Create user for test');

        $user = new \app\models\User();
        $user->username = 'update_user_test';
        $user->setPassword('password');
        $user->save();

        $I->comment('User created. Start testing');

        $I->amOnRoute('user');
        $I->see('update_user_test');
        $I->click("//td[contains(text(), \"update_user_test\")]//parent::tr//a[@title=\"Update\"]"); //"Update" button in row, that contains text "update_user_test"

        $I->see('Update user: update_user_test');

        $I->fillField('#user-username', 'update_user_test_new');
        $I->click('Save');

        $I->amOnRoute('user');
        $I->see('update_user_test_new');
    }

    public function deleteUser(\FunctionalTester $I)
    {
        $I->comment('Create user for test');

        $update_user = new \app\models\User();
        $update_user->username = 'delete_user_test';
        $update_user->setPassword('password');
        $update_user->save();

        $I->comment('User created. Start testing');

        $user_id = $update_user->getId();

        $I->amOnRoute('user');
        $I->see('admin');
        $I->see('delete_user_test');

        $I->sendAjaxPostRequest('/index-test.php/user/delete?id='.$user_id); //We cant just click button because "delete" method need POST request

        $I->amOnRoute('user');
        $I->see('admin');
        $I->dontSee('delete_user_test');
    }
}