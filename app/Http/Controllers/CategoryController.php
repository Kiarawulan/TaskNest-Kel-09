<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories()->withCount('tasks')->get();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:100']);
        Auth::user()->categories()->create(['name' => $request->name]);
        return back()->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function destroy(Category $category)
    {
        abort_if($category->user_id !== Auth::id(), 403);

        if ($category->tasks()->exists()) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh tugas lain!');
        }

        $category->delete();
        return back()->with('success', 'Kategori berhasil dihapus!');
    }
}
