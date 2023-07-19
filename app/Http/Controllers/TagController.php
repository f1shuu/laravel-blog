<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index', [
            'tags' => Tag::paginate(18)
        ]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
        ]);

        Tag::create([
            'name' => request('name'),
            'user_id' => request()->user()->id,
            'color' => Str::lower(request('name')) . '-500',
            'slug' => Str::lower(request('name')),
        ]);

        return redirect('/tags')->with('success', 'Tag created successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/tags')->with('success', 'Tag deleted successfully');
    }
}
