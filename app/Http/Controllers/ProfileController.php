<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user()->load('profile');

        $orders = Order::with('items')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(4, ['*'], 'orders_page');

        $wishlists = Wishlist::with('product.category', 'product.images')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $addresses = UserAddress::where('user_id', $user->id)
            ->orderByDesc('is_default')
            ->get();

        $stats = [
            'total_orders' => Order::where('user_id', $user->id)->count(),
            'wishlist_count' => $wishlists->count(),
            'address_count' => $addresses->count(),
        ];

        return view('account', compact('user', 'orders', 'wishlists', 'addresses', 'stats'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'mobile_number' => 'required|string|max:20',
            'email'         => 'required|email|unique:users,email,' . Auth::id(),
            'address'       => 'nullable|string|max:255',
            'city'          => 'nullable|string|max:100',
            'state'         => 'nullable|string|max:100',
            'pincode'       => 'nullable|string|max:10',
            'dob'           => 'nullable|date',
            'gender'        => 'nullable|in:male,female,other',
        ]);

        $user = Auth::user();
        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'mobile_number' => $request->mobile_number,
        ]);

        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['address', 'city', 'state', 'pincode', 'dob', 'gender'])
        );

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function deleteAccount(Request $request)
    {
        $request->validate(['password' => 'required']);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        Auth::logout();
        $user->delete();

        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }
}
