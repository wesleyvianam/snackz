<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('workspace_id', Auth::user()->workspace_id)->get();

        return view('categories.index', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $workspace = $this->getWorkspace();

        $category = Category::create([
            'title' => $request->title,
            'workspace_id' => $workspace->id
        ]);

        return to_route('categories.index');
    }

    public function update(Category $category, Request $request): RedirectResponse
    {
        $category->update([
            'title' => $request->title
        ]);

        return to_route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        return to_route('categories.index');
    }
}
