<?php
namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Auth::user()->tasks()->with('category');
        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        $tasks      = $query->latest()->get();
        $categories = Auth::user()->categories()->withCount('tasks')->get();
        return view('dashboard.index', compact('tasks', 'categories'));
    }

    public function create()
    {
        $user = Auth::user();
        $categories = $user->categories()->get();
        if ($categories->isEmpty()) {
            foreach (['Pekerjaan', 'Pribadi', 'Belanja', 'Kesehatan'] as $catName) {
                $user->categories()->create(['name' => $catName]);
            }
            $categories = $user->categories()->get();
        }
        return view('tasks.create', compact('categories'));
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        Task::create($data);
        return redirect('/dashboard')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function edit(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);
        $categories = Auth::user()->categories()->get();
        return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);
        $task->update($request->validated());
        return redirect('/dashboard')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function destroy(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);
        $task->delete();
        return redirect('/dashboard')->with('success', 'Tugas berhasil dihapus!');
    }

    public function toggle(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);
        $task->update(['status' => $task->status === 'selesai' ? 'belum selesai' : 'selesai']);
        return back();
    }
}
