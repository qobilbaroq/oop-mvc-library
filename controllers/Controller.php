<?php

class Controller{
    protected static function view($page, $data = [], $data2=[], $data3=[]){
        $data;
        $data2;
        $data3;
        require $page;
    }
}