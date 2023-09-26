<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        // dump($_POST); // will show csrf token
        // dump(request()); // will show request with all details | everything

        // dump(request('idea')); // will show only idea [name="idea" in from tag]

        $idea = new Idea([
            'content' => request('idea'),
        ]);
        $idea->save();

        return redirect()->route('dashboard');
    }
}
