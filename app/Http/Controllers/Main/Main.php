<?php
namespace App\Http\Controllers\Main;
use App\Http\Controllers\Controller;
use App\Model\Contact;

// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Main extends Controller
{

    public function servein()
    {
        return view('frontend.servein');
    }

    public function about()
    {
        return view('frontend.about');
    }
    


            
}