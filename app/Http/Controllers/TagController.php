<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags                   =       Tag::paginate(10);

        return view("tags.index", compact("tags"));
    }

    public function create()
    {
        $title                  =       __("Agregar nueva etiqueta");
        $tag                    =       new Tag;
        $textButton             =       __("Registrar etiqueta");
        $route                  =       route("tags.store");
        
        return view("tags.create", compact("title", "tag","textButton", "route"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name"              =>      "string|required",
            "description"       =>      "string|nullable",
        ]);
        Tag::create($request->all());

        return redirect(route("tags.index"));
    }

    public function edit(Tag $tag)
    {
        $update                 =       true;
        $title                  =       __("Editar etiqueta");
        $textButton             =       __("Actualizar registro");
        $route                  =       route('tags.update', ['tag'=>$tag]);

        return view('tags.edit', compact('update','title','textButton','route','tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            "name"              =>      "string|required",
            "description"       =>      "string|max:299",
        ]);
        $tag->fill($request->all())->update();

        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back();
    }
}
