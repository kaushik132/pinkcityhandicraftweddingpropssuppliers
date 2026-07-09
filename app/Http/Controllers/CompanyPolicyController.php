<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;

class CompanyPolicyController extends Controller
{
    public function privacyPolicy()
    {
         $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_privacy ?? 'Privacy Policy — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_privacy ?? '';
    $seo_data['keywords'] = $homepage->seo_key_privacy ?? '';
    $canocial = url('/privacy-policy');
        return view('privacy_policy', compact('seo_data', 'canocial'));
    }

    public function termsAndConditions()
    {
        $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_terms ?? 'Terms & Conditions — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_terms ?? '';
    $seo_data['keywords'] = $homepage->seo_key_terms ?? '';
    $canocial = url('/terms-and-conditions');
        return view('terms_and_conditions', compact('seo_data', 'canocial'));
    }

    public function shippingPolicy()
    {
        $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_shipping ?? 'Shipping Policy — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_shipping ?? '';
    $seo_data['keywords'] = $homepage->seo_key_shipping ?? '';
    $canocial = url('/shipping-policy',compact('seo_data', 'canocial'));

        return view('shipping_policy');
    }

    public function returnAndRefundPolicy()
    {
         $homepage = Seo::latest()->first();

    $seo_data['seo_title'] = $homepage->seo_title_return ?? 'Return & Refund Policy — Pink City';
    $seo_data['seo_description'] = $homepage->seo_des_return ?? '';
    $seo_data['keywords'] = $homepage->seo_key_return ?? '';
    $canocial = url('/return-and-refund-policy');
        return view('return_and_refund_policy',compact('seo_data', 'canocial'));
    }
}
