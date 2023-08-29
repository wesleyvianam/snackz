<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index(Category $category)
    {
        $snack = $category->snacks()->get();

        return response()->json($snack);
    }

    public function store(Category $category, Request $request)
    {
        $snack = Snack::create([
            "name" => $request->name,
            "category_id" => $category->id
        ]);

        return response()->json($snack);
    }

    public function update(Category $category, Snack $snack, Request $request)
    {
        $snack->update([
            "name" => $request->name
        ]);

        return response()->json($snack);
    }

    public function destroy(Category $category, Snack $snack)
    {
        return response()->json("Remove code");
    }
}
