<?php

namespace App\Http\Controllers\Public;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Comment;
use App\Models\Slider;

class PublicController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->limit(3)->get();

        $categories = Category::active()->get();

        return view('public.home', compact('sliders', 'categories'));
    }

    public function shop()
    {
        //$categories = Category::active()->get();
        $sizes = Size::all();
        $colors = Color::all();
        $brands = Brand::all();
        $products = Product::with('categories')->latest()->paginate(12);

        return view('public.shop', compact('products', 'sizes', 'colors', 'brands'));
    }

    // public function product()
    // {
    //     return view('public.product');
    // }

    public function categoryWiseProducts(Category $category)
    {
        //$categories = Category::active()->get();
        $sizes = Size::all();
        $colors = Color::all();
        $brands = Brand::all();
        $products = $category->products()->latest()->paginate(12);

        return view('public.shop', compact('products', 'sizes', 'colors', 'brands'));
    }

    public function productDetails(Product $product)
    {
        //dd($product->categories);
        //$relatedProducts = Product::with('categories')->whereIn()->latest()->get();
        //dd($relatedProducts);
        $relatedProducts = [];
        foreach ($product->categories as $category) {
            foreach ($category->products as $p) {
                if ($p->id != $product->id) {
                    $relatedProducts[] = $p;
                }
            }
        }
        //dd($relatedProducts);
        //dd($catArr);
        //$category = Category::with('products')->whereIn('id', $catArr)->get();
        //dd($category);
        //$pro = Product::with('categories')->whereIn($product->categories, $catArr)->get();
        //dd($pro);
        return view('public.product', compact('product', 'relatedProducts'));
    }

    public function cart()
    {
        //$user = auth()->user();
        $cart = auth()->user()->cart;

        $cartItemsAll = [];
        if($cart){
            $cartItemsAll = $cart->items()->get();
            //dd($cartItemsAll);
        }
        
        return view('public.cart', compact('cartItemsAll'));
    }

    public function checkout()
    {
        return view('public.checkout');
    }

    public function order()
    {
        return view('public.order');
    }

    public function aboutUs()
    {
        return view('public.about_us');
    }
}
