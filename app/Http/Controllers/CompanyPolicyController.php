<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyPolicyController extends Controller
{
    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function termsAndConditions()
    {
        return view('terms_and_conditions');
    }

    public function shippingPolicy()
    {
        return view('shipping_policy');
    }

    public function returnAndRefundPolicy()
    {
        return view('return_and_refund_policy');
    }
}
