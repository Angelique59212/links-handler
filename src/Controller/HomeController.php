<?php

namespace App\Controller;

use App\Controller\AbstractController;
use JetBrains\PhpStorm\NoReturn;


class HomeController extends AbstractController
{
    /**
     * @return void
     */
    #[NoReturn] public function index(): void
    {
        $this->render('home/home');
    }
}
