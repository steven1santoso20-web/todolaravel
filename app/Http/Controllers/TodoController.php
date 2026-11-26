<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Menampilkan seluruh data Todo
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todo.index', compact('todos'));
    }

    // Menampilkan halaman tambah Todo
    public function create()
    {
        return view('todo.create');
    }

    // Menyimpan Todo baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $isDone = $request->boolean('is_done');

        $validated['is_done'] = $isDone;
        $validated['completed_at'] = $isDone ? now() : null;

        Todo::create($validated);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo berhasil ditambahkan!');
    }

    // Menampilkan halaman edit Todo
    public function edit(Todo $todo)
    {
        return view('todo.edit', compact('todo'));
    }

    // Memperbarui Todo
    public function update(Request $request, Todo $todo)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $isDone = $request->boolean('is_done');

        $validated['is_done'] = $isDone;

        if ($isDone) {
            $validated['completed_at'] = $todo->is_done
                ? $todo->completed_at
                : now();
        } else {
            $validated['completed_at'] = null;
        }

        todo->update(validated);

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo berhasil diperbarui!');
    }

    // Menghapus Todo
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()
            ->route('todos.index')
            ->with('success', 'Todo berhasil dihapus!');
    }
}

