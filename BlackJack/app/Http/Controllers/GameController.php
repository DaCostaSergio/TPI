<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardUser;
use App\Models\Game;
use App\Models\User;
use App\Models\Join;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Timstamps;

class GameController extends Controller
{

    public function testRequest(){
        return response()->json(["message" => "la requete fonctionne"]);
    }
    /**
     * @param Request $request
     * @return void
     */

    public function GetAuthUser()
    {
        $onlineUsers = User::where('isOnGame',1) ->get();

        return response()->json($onlineUsers);
    }

    public function startGame()
    {
        //affiche les données des Users
        $user = User::find(3);

        //affiche les données de Game
        $game = Game::find(1);

        dd($game->users);
        dd($user);

        //Définit si un joueur peut rejoindre la partie
        $userCanPlay = User::where('useCash','>=', 20)
                        ->where('isOnGame', 1)
                        ->get();
        return response()->json($userCanPlay );

        // distribute cards for each users and push it to the database


    }

    /**
     * @return void
     */
    public function Distribute()
    {

        $players = User::where('isOnGame',1)->get();
        $cards = Card::pluck('id');
        $newcards = collect();

        //for each User online, they get two cards
        foreach ($players as $player){

            for ($i = 0; $i < 2; $i++){
                $newcard = CardUser::create([
                    //get random card Id
                    'card_id' => $cards->random(),
                    //get online User ID
                    'user_id' => $player->id,
                ]);

                //Push use Cards to new cards collection
                $newcards->push($newcard);
            }
        }

        //Show value card
        dd($newcards->get(2)->value);
    }

    public function GetAnotherCard()
    {

    }
    /**
     * @return void
     */
    public function game_status()
    {

    }
}
