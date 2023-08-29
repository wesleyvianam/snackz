<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $workspace = $this->getWorkspace();

        $categories = Category::where('workspace_id', $workspace->id)->get();

        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $workspace = $this->getWorkspace();

        $category = Category::create([
            'title' => $request->title,
            'workspace_id' => $workspace->id
        ]);

        return response()->json($category);
    }

    public function update(Category $category, Request $request)
    {
        $category->update([
            'title' => $request->title
        ]);

        return response()->json($category);
    }

    public function destroy()
    {
        return response()->json("implementar softdelete");
    }
}
