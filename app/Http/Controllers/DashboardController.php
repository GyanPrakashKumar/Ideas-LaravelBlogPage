<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // dump(Idea::all());

        return view('welcome', [
            // 'ideas' => Idea::all(),
            'ideas' => Idea::orderBy('created_at', 'desc')->paginate(7),
        ]);
    }
}
