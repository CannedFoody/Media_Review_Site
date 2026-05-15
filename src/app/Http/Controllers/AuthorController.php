<?php

namespace App\Http\Controllers;


use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function list(): View
    {
        $items = Author::orderBy("name", "asc")->get();

        return view(
            "author.list",
            [
                "title" => "Authors",
                "items" => $items,
            ]
        );
    }

    public function create(): View
    {
        return View(
            'author.form',
            [
                'title' => 'Add author',
                'author' => new Author()
            ]
        );
    }

    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Author();
        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }

    // display Author editing form
    public function update(Author $author): View
    {
        return view(
            'author.form',
            [
                'title' => 'Edit author',
                'author' => $author
            ]
        );
    }

    public function patch(Author $author, Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }

    public function delete(Author $author): RedirectResponse
    {
        // šeit derētu pārbaude, kas neļauj dzēst autoru, ja tas piesaistīts eksistējošām grāmatām
        $author->delete();
        return redirect('/authors');
    }
}
