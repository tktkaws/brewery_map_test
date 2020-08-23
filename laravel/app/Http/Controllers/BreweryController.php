<?php

namespace App\Http\Controllers;

use App\Brewery;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\BreweryRequest;

class BreweryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Brewery::class, 'brewery');
    }

    public function index()
    {
        $breweries = Brewery::all()->sortByDesc('created_at');
        return view('breweries.index', ['breweries' => $breweries]);
    }

    public function create()
    {
        return view('breweries.create');
    }

    public function store(BreweryRequest $request, Brewery $brewery)
    {
        $brewery->fill($request->all()); //-- この行を追加
        $brewery->user_id = $request->user()->id;
        $brewery->save();

        $request->tags->each(function ($tagName) use ($brewery) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $brewery->tags()->attach($tag);
        });

        return redirect()->route('breweries.index');
    }

    public function edit(Brewery $brewery)
    {

        $tagNames = $brewery->tags->map(function ($tag) {
            return ['text' => $tag->name];
        });

        return view('breweries.edit', [
            'brewery' => $brewery,
            'tagNames' => $tagNames,
        ]);

    }

    public function update(BreweryRequest $request, Brewery $brewery)
    {
        $brewery->fill($request->all())->save();

        $brewery->tags()->detach();
        $request->tags->each(function ($tagName) use ($brewery) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $brewery->tags()->attach($tag);
        });

        return redirect()->route('breweries.index');
    }

    public function destroy(Brewery $brewery)
    {
        $brewery->delete();
        return redirect()->route('breweries.index');
    }

    public function show(Brewery $brewery)
    {
        return view('breweries.show', ['brewery' => $brewery]);
    }

    public function like(Request $request, Brewery $brewery)
    {
        $brewery->likes()->detach($request->user()->id);
        $brewery->likes()->attach($request->user()->id);

        return [
            'id' => $brewery->id,
            'countLikes' => $brewery->count_likes,
        ];
    }

    public function unlike(Request $request, Brewery $brewery)
    {
        $brewery->likes()->detach($request->user()->id);

        return [
            'id' => $brewery->id,
            'countLikes' => $brewery->count_likes,
        ];
    }
}