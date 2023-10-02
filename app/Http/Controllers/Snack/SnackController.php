<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Snack;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SnackController extends Controller
{
    public function index(): View
    {
        $workspace = $this->getWorkspaceId();
        $snacks = Snack::where('workspace_id', $workspace)->get();
        $categories = Category::where('workspace_id', $workspace)->get();

        $formatCategories = [];
        foreach ($categories as $category) {
            $formatCategories[$category->id] = $category->title;
        }

        foreach ($snacks as $keys => $snack) {
            $snacks[$keys]['category'] = $formatCategories[$snack->category_id];
        }

        return view('snacks.index', compact('snacks', 'formatCategories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $snack = Snack::create([
            "name" => $request->name,
            "category_id" => $request->category,
            "workspace_id" => $this->getWorkspaceId()
        ]);

        return to_route('snacks.index');
    }

    public function update(Category $category, Snack $snack, Request $request): RedirectResponse
    {
        $snack->update(["name" => $request->name]);

        return to_route('snacks.index');
    }

    public function destroy(Snack $snack): RedirectResponse
    {
        $snack->delete();

        return to_route('snacks.index');
    }
}
