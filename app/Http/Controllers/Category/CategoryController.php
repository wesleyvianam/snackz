<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::where('workspace_id', $this->getWorkspaceId())->get();

        return view('categories.index', compact('categories'));
    }

    public function options(): JsonResponse
    {
        $user = Auth::user();
        return $user;
        $categories = Category::where('workspace_id', $this->getWorkspaceId())->with('snacks')->get();

        return response()->json($categories);
    }

    public function store(Request $request): RedirectResponse
    {
        $category = Category::create([
            'title' => $request->title,
            'workspace_id' => $this->getWorkspaceId(),
            'accept_quantity' => $request->quantity ?? 0
        ]);

        return to_route('categories.index')->with(['success' => "Category $category->title created Successfully"]);
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

        return to_route('categories.index')->with(['success' => "Category $category->title deleted Successfully"]);
    }
}
