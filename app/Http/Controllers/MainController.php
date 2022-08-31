<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function home()
    {
        $albums = new Album();
        return view('home', ['albums' => $albums->all()]);
    }

    public function edit()
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        return view('edit');
    }

    public function change($id)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $album = new Album();
        foreach (Album::all() as $item){
            if($id == $item->id){
                $album = $item;
            }
        }
        return view('edit', ['album' => $album]);
    }

    public function change_check($id, Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|max:100',
            'singer' => 'required|max:20',
            'description' => 'required',
        ]);
        $album = new Album();
        foreach (Album::all() as $item){
            if($id == $item->id){
                $album = $item;
            }
        }
        if($request->input('name') != $album->name){
            $album->oldName = $album->name;
        }
        if($request->input('singer') != $album->singer){
            $album->oldSinger = $album->singer;
        }
        if($request->input('description') != $album->description){
            $album->oldDescription = $album->description;
        }
        if($this->search($request->input('name')) != $album->image){
            $album->oldImage = $album->image;
        }
        $album->name = $request->input('name');
        $album->singer = $request->input('singer');
        $album->description = $request->input('description');
        $album->image = $this->search($album->name);
        $album->update();
        return redirect()->route('home');
    }

    public function edit_check(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required|max:100',
            'singer' => 'required|max:20',
            'description' => 'required',
        ]);

        $album = new Album();
        $album->name = $request->input('name');
        $album->singer = $request->input('singer');
        $album->description = $request->input('description');
        $album->image = $this->search($album->name);

        $album->save();

        return redirect()->route('home');
    }

    public function delete(Request $request, $id)
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $album = Album::where('id', $id)->first();
        $album->delete();
        return redirect()->route('home');
    }

    public function search($name)
    {
        $API_KEY = '88e0da9355e173604947342f33334c13';
        $url = "http://ws.audioscrobbler.com/2.0/?method=album.search&album=$name&api_key=$API_KEY&format=json";

        $response = Http::get($url);
        if($response->ok()){
            $album = $response->json();
            $albums = $album['results']['albummatches']['album'];
            if(count($albums) > 0){
                return $albums[0]['image'][2]['#text'];
            } else {
                return 'https://w7.pngwing.com/pngs/766/422/png-transparent-no-symbol-scalable-graphics-drug-free-angle-text-logo-thumbnail.png';
            }
        } else {
            return 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/No-Symbol.png/240px-No-Symbol.png';
        }
    }
}
