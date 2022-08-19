<?php

namespace App\Http\Controllers\Public;

use Exception;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart;

        $cartItemsAll = [];
        if ($cart) {
            $cartItemsAll = $cart->items()->with('product')->get();
        }

        return view('public.cart', compact('cart', 'cartItemsAll'));
    }

    // public function store(Product $product)
    // {
    //     $user = auth()->user();

    //     if ($cart = $user->cart) {
    //         // $cart->update([
    //         //     'total_price' => //new price
    //         // ]);
    //     } else {
    //         $user->cart()->create([
    //             'total_price' => 0,
    //         ]);
    //     }

    //     //$unitPrice = 100;
    //     //$unitPrice = request()->unitPrice;

    //     // unitPrice should be this
    //     $unitPrice = $product->discounted_price;

    //     $qty = request()->qty;

    //     $user->cart->items()->create([
    //         'product_id' => $product->id,
    //         'unit_price' => $unitPrice,
    //         'qty' => $qty,
    //         'total_price' => $unitPrice * $qty
    //     ]);

    //     return response()->json(
    //         [
    //             'status' => true,
    //             'data' => $user->cart,
    //             'message' => 'Cart Added Successfully !'
    //         ]
    //     );
    // }

    public function store(Product $product)
    {
        try {
            DB::beginTransaction();
            
            $user = auth()->user();
            $unitPrice = $product->discounted_price;
            $qty = request()->qty;
            $totalPrice = $unitPrice * $qty;

            if ($cart = $user->cart) {
                $cart->update([
                    'total_price' => $cart->total_price + $totalPrice
                ]);
            } else {
                $cart = $user->cart()->create([
                    'total_price' => $totalPrice,
                ]);
            }

            $cart->items()->create([
                'product_id' => $product->id,
                'unit_price' => $unitPrice,
                'qty' => $qty,
                'total_price' => $totalPrice
            ]);
            DB::commit();
            return response()->json(
                [
                    'status' => true,
                    'data' => $user->cart,
                    'message' => 'Cart Added Successfully !'
                ]
            );
        } catch (QueryException | Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => 'Somethings went wrong'
                ],
                500
            );
        }
    }

    public function destroy(CartItem $cartItem)
    {
        try{
            DB::beginTransaction();

            $user = auth()->user();

            if ($cart = $user->cart) {
                $cart->update([
                    'total_price' => $cart->total_price - $cartItem->total_price
                ]);
            }
    
            $cartItem->delete();
        
        
            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Item removed from cart successfully',
            ]);
        }catch (QueryException | Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());

            return response()->json(
                [
                    'status' => false,
                    'data' => [],
                    'message' => 'Somethings went wrong'
                ],
                500
            );
        }
    }
}
