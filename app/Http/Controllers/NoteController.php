<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes                  =       Note::with('category', 'tags')->where('status', 1)->paginate(10);

        return view('notes.index', compact("notes"), [
            'category'          =>      Category::get(),
            'tags'               =>      Tag::get(),
        ]);
    }

    public function archivadas()
    {
        $notes                  =       Note::with('category', 'tags')->where('status', 2)->paginate(10);

        return view('notes.archivadas', compact("notes"), [
            'category'          =>      Category::get(),
            'tags'               =>      Tag::get(),
        ]);
    }

    
    public function create()
    {
        $title                  =       __("Agregar nota");
        $note                   =       new Note;
        $categories             =       Category::get();
        $tags                   =       Tag::all();
        $textButton             =       __("Registrar nota");
        $route                  =       route("notes.store");

        return view('notes.create', compact('title','note','categories','tags','textButton','route'));
    }

    
    public function store(Request $request)
    {
        $notes                  =       Note::create($request->all());

        if($request->tag)
        {
            $notes->tags()->attach($request->tag);
        }

        return redirect()->route('notes.index', $notes);
    }

    
    public function edit(Note $note)
    {
        $update                 =       true;
        $title                  =       __("Editar nota");
        $categories             =       Category::get();
        $tags                   =       Tag::all();
        $textButton             =       __("Actualizar registro");
        $route                  =       route("notes.update", ["note" =>$note]);

        return view("notes.edit", compact("update","route" ,"title", "textButton","categories","tags","note"));
    }

    
    public function update(Request $request, Note $note)
    {
        $note->update($request->all());

        if($request->tags)
        {
            $note->tags()->sync($request->tags);
        }

        return redirect()->route('notes.index', $note);
    }

    
    public function destroy(Note $note)
    {
        $note->delete();

        return back();
    }

    public function estado($id)
    {
        $note=  Note::findOrFail($id);
        if($note->status == 1)
        {
            $note->status= 2;
            $note->update();
        }else{
            $note->status= 1;
            $note->update();
        }
        
        return back();
    }
}
