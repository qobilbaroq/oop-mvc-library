<?php

require 'Controller.php';
class HomeController extends Controller
{
    public static function index()
    {
        return self::view('views/home.php');
    }
}

HomeController::index();