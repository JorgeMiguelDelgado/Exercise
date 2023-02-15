<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $count=1;
        $notes = Note::query();
    
        if ($request->has('note_id')) {
            $notes->whereHas('tags', function ($query) use ($request) {
                $query->where('tags.id', '=', $request->input('tags'));
            });
        }
        
    
        if ($request->has('category_id')) {
            $notes->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->input('category_id'));
            });
        }
    
        $notes = $notes->orderBy('created_at', 'desc')->get();
    
        $tags = Tag::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
    
        return view('home', [
            'notes' => $notes,
            'tags' => $tags,
            'categories' => $categories,
            'selectedTag' => $request->input('tags'),
            'selectedCategory' => $request->input('category_id'),
        ]);
    }
}
