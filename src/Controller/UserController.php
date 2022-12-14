<?php

namespace App\Controller;

use RedBeanPHP\R;

class UserController extends AbstractController
{
    public function index() {
        $this->render('user/register');
    }

    public function register()
    {
        self::render('user/register');

        if (isset($_POST['submit'])) {
            if (self::formIsset('pseudo', 'email', 'password', 'password-repeat')) {
                $pseudo = $this->dataClean($this->getFormField('pseudo'));
                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $password = $this->dataClean($this->getFormField('password'));
                $passwordRepeat = $this->dataClean($this->getFormField('password-repeat'));

                if ($password !== $passwordRepeat) {
                    header('Location: /?c=user&a=register');
                    exit();
                }

                $user = R::findOne('user', 'pseudo=?', [$pseudo]);
                $user = R::findOne('user', 'email', [$email]);

                if (null === $user) {
                    $user = R::dispense('user');
                    $user->userFirstname = $pseudo;
                    $email->userEmail = $email;
                    $user->userPassword = password_hash($password, PASSWORD_ARGON2I);

                    R::store($user);
                } else {
                    header('Location: /?c=user&a=register');
                    exit();
                }

                header('Location: /?c=user&a=login');
            }
        }
    }
}