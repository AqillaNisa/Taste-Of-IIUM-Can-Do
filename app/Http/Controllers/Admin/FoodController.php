<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Stall;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FoodController extends Controller
{
    public function index(): View
    {
        return view('admin.foods.index', [
            'foods' => Food::with('stall')->latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.foods.create', [
            'stalls' => Stall::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'stall_id' => ['nullable', 'exists:stalls,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '-', $image->getClientOriginalName());
            
            // 1. Simpan terus fail imej baharu secara fizikal ke folder stalls
            $image->move(public_path('assets/img/foodpic/stalls'), $imageName);
            
            // 2. Set laluan 'stalls/' ke dalam pangkalan data
            $data['image_path'] = 'stalls/' . $imageName;
        }

        unset($data['image']);

        Food::create($data);

        return redirect()->route('admin.foods.index')->with('status', 'Food item created successfully.');
    }

    public function edit(Food $food): View
    {
        return view('admin.foods.edit', [
            'food' => $food,
            'stalls' => Stall::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Food $food): RedirectResponse
    {
        $data = $request->validate([
            'stall_id' => ['nullable', 'exists:stalls,id'],
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // 1. Padam fail imej lama secara fizikal dari folder stalls jika wujud
            if ($food->image_path && file_exists(public_path('assets/img/foodpic/' . $food->image_path))) {
                @unlink(public_path('assets/img/foodpic/' . $food->image_path));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '-', $image->getClientOriginalName());
        
            // 2. Alihkan fail imej fizikal baharu ke folder stalls
            $image->move(public_path('assets/img/foodpic/stalls'), $imageName);
            
            $data['image_path'] = 'stalls/' . $imageName;
        }

        unset($data['image']);

        $food->update($data);

        return redirect()->route('admin.foods.index')->with('status', 'Food item updated successfully.');
    }

    public function destroy(Food $food): RedirectResponse
    {
        // Padam fail imej secara fizikal dari folder stalls apabila data dipadam
        if ($food->image_path && file_exists(public_path('assets/img/foodpic/' . $food->image_path))) {
            @unlink(public_path('assets/img/foodpic/' . $food->image_path));
        }

        $food->delete();

        return redirect()->route('admin.foods.index')->with('status', 'Food item deleted successfully.');
    }
}