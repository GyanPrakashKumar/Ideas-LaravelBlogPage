<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // dump(Idea::all());

        $ideas = Idea::orderBy('created_at', 'desc');

        if (request()->has('search')) {
            $ideas = $ideas->where('content','like','%'. request()->get('search','') . '%');
        }

        return view('welcome', [
            // 'ideas' => Idea::all(),
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
