<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{
    public function home()
    {

        return view('pages.home');
    }


    public function shop(string $slug): View
    {

        return view('pages.product');
    }



    public function category(string $slug): View
    {

        return view('pages.category');
    }


    public function myAccount()
    {
        return view('pages.my-account');
    }

    public function lostPassword()
    {
        return view('pages.lost-password');
    }




    public function contact()
    {
        return view('pages.contact');
    }

    public function shippingPolicy()
    {
        return view('pages.shipping-policy');
    }

    public function returnPolicy()
    {
        return view('pages.return-policy');
    }

    public function paymentPolicy()
    {
        return view('pages.payment-policy');
    }

    // --- Legal Information ---
    public function legalNotice()
    {
        return view('pages.legal-notice');
    }

    public function termsOfUse()
    {
        return view('pages.terms-of-use');
    }

    public function termsOfSale()
    {
        return view('pages.terms-of-sale');
    }

    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function cookiePolicy()
    {
        return view('pages.cookie-policy');
    }
}
