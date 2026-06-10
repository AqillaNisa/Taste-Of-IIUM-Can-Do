<?php

namespace App\Http\Controllers;

use App\Models\Stall;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StallPageController extends Controller
{
    public function show(Request $request, $mahallah): View
    {
        // Use eager-loading 'with' to fetch food items along with the stall
        $query = Stall::with('foods')->where('mahallah', $mahallah);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $stalls = $query->get();

        return view('stall', [
            'mahallah' => ucfirst($mahallah),
            'stalls' => $stalls
        ]);
    }
}


