<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if(auth()->user()->is_admin) {
            $userCount = User::where('is_admin', '=', 0)->count();
            $adminCount = User::where('is_admin', '=', 1)->count();
            $gameCount = Game::count();

            return view('home.admin', compact('userCount', 'adminCount', 'gameCount'));
        }

        $games = Game::all();

        if(request('search')){
            return view('web.home', [
                "title" => "Search Result For: ".request('search'),
                "category" => "keyword '".request('search')."'",
                "games" => Game::latest()->filter(request(['search']))->get()
            ]);
        }

        return view('web.home', compact('games'));
    }
}
