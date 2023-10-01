<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('workspace_id', Auth::user()->workspace_id)->get();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $workspace = $this->getWorkspace();

        $category = Category::create([
            'title' => $request->title,
            'workspace_id' => $workspace->id
        ]);

        return to_route('categories.index');
    }

    public function update(Category $category, Request $request)
    {
        $category->update([
            'title' => $request->title
        ]);

        return to_route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('categories.index');
    }
}
