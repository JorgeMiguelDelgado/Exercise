<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::paginate(10);

        return view("categories.index", compact("categories"));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {
        
    }

    public function destroy()
    {

    }
}
