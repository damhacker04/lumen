<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function store(Request $request) {
        // Validasi
        $this->validate($request, ['product_id' => 'required|exists:products,id']);

        $user = $request->user();
        $product = Product::find($request->product_id);

        // 1. Buat Order
        $order = Order::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'total_price' => $product->price,
            'payment_status' => 'paid' // Asumsikan Payment Mockup Langsung Sukses
        ]);

        // 2. Simulasi URL Pembayaran (Integrasi Mockup)
        $payment_url = "https://mock-payment-gateway.com/pay/sandbox-" . uniqid();

        // 3. Pengiriman Email via Gmail & Logging
        try {
            Mail::raw("Terima kasih, pembayaran Rp {$product->price} untuk {$product->name} berhasil.", function($msg) use ($user) {
                $msg->to($user->email)->subject('Pembayaran Sukses');
            });
        } catch (\Exception $e) {
            Log::error('Gagal mengirim email ke ' . $user->email . '. Error: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Checkout berhasil',
            'payment_url' => $payment_url,
            'data' => $order
        ], 201);
    }
}