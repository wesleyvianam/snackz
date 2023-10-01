<?php

namespace App\Http\Controllers\Snack;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Snack;
use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SnackController extends Controller
{
    public function index()
    {
        $workspace = $this->getWorkspace();
        $snacks = Snack::where('workspace_id', $workspace)->get();
        $categories = Category::where('workspace_id', $workspace)->get();

        $formatCategories = [];
        foreach ($categories as $category) {
            $formatCategories[$category->id] = $category->title;
        }

        return view('snacks.index', compact('snacks', 'formatCategories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $snack = Snack::create([
            "name" => $request->name,
            "category_id" => $request->category,
            "workspace_id" => $this->getWorkspace()
        ]);

        return to_route('snacks.index');
    }

    public function update(Category $category, Snack $snack, Request $request)
    {
        $snack->update([
            "name" => $request->name
        ]);

        return to_route('snacks.index');
    }

    public function destroy(Snack $snack)
    {
        $snack->delete();

        return to_route('snacks.index');
    }
}
