<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|in:home,work,other',
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
        ]);

        if ($request->has('is_default')) {
            UserAddress::where('user_id', auth()->id())->update(['is_default' => false]);
        }

        UserAddress::create([
            'user_id' => auth()->id(),
            'type' => $request->label,
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'landmark' => $request->landmark,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'is_default' => $request->has('is_default'),
        ]);

        return back()->with('success', 'Address added successfully!');
    }

    public function update(Request $request, $id)
    {
        $address = UserAddress::where('user_id', auth()->id())->findOrFail($id);

        $request->validate([
            'label' => 'required|in:home,work,other',
            'full_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|string|max:10',
        ]);

        if ($request->has('is_default')) {
            UserAddress::where('user_id', auth()->id())->update(['is_default' => false]);
        }

        $address->update([
            'type' => $request->label,
            'full_name' => $request->full_name,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'landmark' => $request->landmark,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'is_default' => $request->has('is_default'),
        ]);

        return back()->with('success', 'Address updated successfully!');
    }

    public function destroy($id)
    {
        UserAddress::where('user_id', auth()->id())->findOrFail($id)->delete();
        return back()->with('success', 'Address deleted.');
    }
}
