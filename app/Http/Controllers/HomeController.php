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

        return view('web.home', compact('games'));
    }
}
