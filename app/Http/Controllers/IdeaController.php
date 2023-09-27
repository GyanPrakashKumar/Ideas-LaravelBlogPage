<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class IdeaController extends Controller
{
    // ======== Store/Create ==========
    public function store()
    {
        // dump($_POST); // will show csrf token
        // dump(request()); // will show request with all details | everything

        // dump(request('idea')); // will show only idea [name="idea" in from tag]

        request()->validate([
            'idea' => 'required|min:5|max:240'
        ]);

        $idea = new Idea([
            'content' => request('idea'),
        ]);
        $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    // ======== Show ==========

    public function show(Idea $id)
    {
        return view('ideas.show', [
            'idea' => $id
        ]);

        // return view('ideas.show', compact('idea'));
    }

    // ======== Show ==========

    public function edit(Idea $id)
    {
        $editing = true;

        return view('ideas.show', [
            'idea' => $id,
            $editing
        ]);
    }

    // ======== Delete ==========

    public function destroy($id)
    {
        // dump('deletinng...');

        // search where id = $id
        // $ideaId = Idea::where('id', $id)->first();   // will give error if we delete same idea from diff webpage without reload
        $ideaId = Idea::where('id', $id)->firstOrFail();    // will show 404 page if we delete same idea from diff webpage without reload
        $ideaId->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }


    /*
        Model binding
        public functiion destroy(Idea $id) { &id->delete(); return.... }
        the $id params/args should be same every where
    */
}
