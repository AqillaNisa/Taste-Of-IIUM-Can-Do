<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StallController extends Controller
{
    public function index(): View
    {
        return view('admin.stalls.index', [
            'stalls' => Stall::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.stalls.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mahallah' => ['required', 'string', 'max:255'],
            'opening_hours' => ['required', 'string', 'max:255'],
            'food_type' => ['required', 'string', 'max:255'],
            'menu_items' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('stalls', 'public');
        }

        unset($data['image']);

        Stall::create($data);

        return redirect()->route('admin.stalls.index')->with('status', 'Stall created successfully.');
    }

    public function edit(Stall $stall): View
    {
        return view('admin.stalls.edit', [
            'stall' => $stall,
        ]);
    }

    public function update(Request $request, Stall $stall): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'mahallah' => ['required', 'string', 'max:255'],
            'opening_hours' => ['required', 'string', 'max:255'],
            'food_type' => ['required', 'string', 'max:255'],
            'menu_items' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/foodpic'), $filename);
    
            $data['image_path'] = $filename;
        }
        unset($data['image']);

        $stall->update($data);

        return redirect()->route('admin.stalls.index')->with('status', 'Stall updated successfully.');
    }

    public function destroy(Stall $stall): RedirectResponse
    {
        if ($stall->image_path) {
            Storage::disk('public')->delete($stall->image_path);
        }

        $stall->delete();

        return redirect()->route('admin.stalls.index')->with('status', 'Stall deleted successfully.');
    }
}
