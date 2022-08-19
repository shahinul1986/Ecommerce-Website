<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $product->comments()->create([
            'body' => $request->body,
            'commented_by' => auth()->user()->id
        ]);
        return redirect()->back();
    }
}
