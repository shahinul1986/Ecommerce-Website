<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders;
        //dd($orders->items);
        return view('public.order', compact('orders'));
    }

    public function create()
    {
        $cart = auth()->user()->cart;

        $orderItemsAll = [];
        if ($cart) {
            $orderItemsAll = $cart->items()->with('product')->get();
        }
        //dd($orderItemsAll);
        return view('public.checkout', compact('cart', 'orderItemsAll'));
    }

    public function store(Request $request)
    {
        try {
            $user = auth()->user();

            $totalPrice = 0;

            DB::beginTransaction();
            $order = $user->orders()->create([
                'invoice_number' => date('dmy') . time(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company_name' => $request->company_name,
                'country' => $request->country,
                'street_address' => $request->street_address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'phone' => $request->phone,
                'email' => $request->email,
                'additional_info' => $request->additional_info,
                'terms_condition' => $request->terms_condition ?? 0,
                'payment_method' => "Credit Card",
                'total_price' => $totalPrice

            ]);

            $requesedItemsId = $request->item_id;
            $requesedItemQty = $request->qty;
            $data = [];
            for ($i = 0, $max = count($requesedItemsId); $i < $max; $i++) {
                $productId = $requesedItemsId[$i];
                $product = Product::select('id', 'title', 'image', 'discounted_price')
                    ->whereId($productId)->firstOrFail();
                $qty = $requesedItemQty[$i];
                $data[] = [
                    'unit_price' => $product->discounted_price,
                    'qty' => $qty,
                    'total_price' => $product->discounted_price * $qty,
                    'product_id' => $productId,
                    'meta' => json_encode($product->toArray())
                ];
                $totalPrice += $data[$i]['total_price'];
            }

            $order->items()->createMany($data);

            $order->update([
                'total_price' => $totalPrice
            ]);

            $this->removeCart($user);

            DB::commit();

            return redirect()->route('orders.index');
        } catch (QueryException $e) {
            DB::rollBack();
            //dd($e->getMessage());
        }
    }

    public function removeCart($user)
    {
        foreach ($user->cart->items as $cartItem) {
            $cartItem->delete();
        }
        $user->cart->delete();
    }
}
