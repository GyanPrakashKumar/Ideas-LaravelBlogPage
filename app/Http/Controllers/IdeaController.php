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
            'content' => 'required|min:5|max:240'
        ]);

        $idea = Idea::create(request()->all());
        // $idea = Idea::create([
        //     'content' => request()->get('content', ''),
        // ]);
        // $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully');
    }

    // ======== Show ==========

    public function show(Idea $idea)
    {

        // dd($idea->commentBoxes); // will show all comments of this idea

        return view('ideas.show', [
            'idea' => $idea
        ]);

        // return view('ideas.show', compact('idea'));
    }

    // ======== Edit ==========

    public function edit(Idea $idea)
    {
        $editing = true;

        return view('ideas.show', compact('idea', 'editing'));
    }

    // ======== Updaate ==========

    public function update(Idea $idea)
    {
        request()->validate([
            'content' => 'required|min:5|max:240'
        ]);

        $idea->content = request()->get('content', '');
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully');
    }

    // ======== Delete ==========

    public function destroy($idea)
    {
        // dump('deletinng...');

        // search where id = $idea
        // $ideaId = Idea::where('idea', $idea)->first();   // will give error if we delete same idea from diff webpage without reload
        $ideaId = Idea::where('id', $idea)->firstOrFail();    // will show 404 page if we delete same idea from diff webpage without reload
        $ideaId->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully');
    }


    /*
        Model binding
        public functiion destroy(Idea $id) { &id->delete(); return.... }
        the $id params/args should be same every where
    */
}
