<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    public function list(): View {
        $items = Author::orderBy("name", "asc")->get();

        return view(
            "author.list", [
                "title" => "Authors",
                "items" => $items,
            ]
        );
    }
}
