<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $categories             =        Category::paginate(10);

        return view("categories.index", compact("categories"));
    }

    public function create()
    {
        $title                  =       __("Agregar nueva categoria");
        $category               =       new Category;
        $textButton             =       __("Registrar categoria");
        $route                  =       route("categories.store");
        
        return view("categories.create", compact("title", "category","textButton", "route"));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "name"              =>      "string|required",
            "description"       =>      "string|nullable",
        ]);
        Category::create($request->all());

        return redirect(route("categories.index"));
    }

    public function edit(Category $category)
    {
        $update                 =       true;
        $title                  =       __("Editar categoria");
        $textButton             =       __("Actualizar registro");
        $route                  =       route('categories.update', ['category'=>$category]);

        return view('categories.edit', compact('update','title','textButton','route','category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            "name"              =>      "string|required",
            "description"       =>      "string|max:299",
        ]);
        $category->fill($request->all())->update();

        return redirect(route('categories.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
