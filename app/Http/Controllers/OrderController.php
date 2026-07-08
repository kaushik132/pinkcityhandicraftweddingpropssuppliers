<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::with('items.product')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        return view('order-detail', compact('order'));
    }

    public function invoice($id)
    {
        $order = Order::with('items')
            ->where('user_id', auth()->id())
            ->findOrFail($id);

        $pdf = Pdf::loadView('invoice', compact('order'));

        return $pdf->download('Invoice-' . $order->order_number . '.pdf');
    }
}
