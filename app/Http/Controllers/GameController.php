<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Genre;
use App\Models\Platform;
use App\Models\GameGenre;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $platforms = Platform::all();

        return view('game.create', compact('genres', 'platforms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $game = new Game();

        $data = [
            'name' => $request->name,
            'publisher' => $request->publisher,
            'release_date' => $request->release,
            'platform_id' => $request->platform,
        ];

        $insertedId = $game->insertGetId($data);
        
        if($request->genres) {
            foreach($request->genres as $genreId) {
                GameGenre::create([
                    'game_id' => $insertedId,
                    'genre_id' => $genreId,
                ]);
            }
        }

        return redirect()->route('games.index')->with('success', 'Game successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        $gameGenreIds = $game->genres->pluck('id')->toArray();

        return view('game.edit', [
            'data' => $game,
            'genres' => Genre::all(),
            'gameGenreIds' => $gameGenreIds
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $gameGenreIds = $game->genres->pluck('id')->toArray();

        return view('game.edit', [
            'data' => $game,
            'genres' => Genre::all(),
            'platforms' => Platform::all(),
            'gameGenreIds' => $gameGenreIds
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        Game::where('id', $game->id)->update([
            'name' => $request->name,
            'publisher' => $request->publisher,
            'release_date' => $request->release,
            'platform_id' => $request->platform,
        ]);

        $gameGenreIds = $game->genres->pluck('id')->toArray();

        if(!$request->genres) {
            GameGenre::where('game_id', $game->id)->delete();
        }else{
            foreach($request->genres as $genreId) {
                if(!in_array($genreId, $gameGenreIds)) {
                    GameGenre::create([
                        'game_id' => $game->id,
                        'genre_id' => $genreId,
                    ]);
                }
            }

            $genresToRemove = array_diff($gameGenreIds, $request->genres);

            GameGenre::where('game_id', $game->id)->whereIn('genre_id', $genresToRemove)->delete();
        }

        return redirect()->route('games.index')->with('success', 'Game successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        Game::where('id', $game->id)->delete();

        return redirect('/games')->with('success', 'Game successfully deleted.');
    }
}
