<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardGame;
use App\Models\CardUser;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Timstamps;

class GameController extends Controller
{

    public function testRequest()
    {
        return response()->json(["message" => "la requete fonctionne"]);
    }



    /**
     * @param Request $request
     * @return void
     */

    //Create Game
    public function create()
    {
        $game = Game::create('game_id');
        $cards = Card::create();
        /**return redirect("/game/{$game->id");**/

    }

    public function getOneUserCards()
    {

        dd(auth('sanctum')->user());
        return auth('sanctum')->user()->cards;
    }


    public function getDealerCards()
    {
        //Get Dealer ID
        $dealer = Game::find(1);
        //Get Cards ID
        $cards = Card::pluck('id');

        //Collection dealer cards
        $dealerCards = collect();

        for ($i = 0; $i < 3; $i++)
        {
            $handDealer = cardGame::create([
                'card_id' => $cards->random(),
                'game_id' => $dealer->id
            ])->value;
        }
        $dealerCards->push($handDealer);

        return $dealerCards;
    }

    public function getPlayerCards()
    {
        //Get all users
        $players = User::all();
        //Get All Cards id
        $cards = Card::pluck('id');

        //Collection player cards
        $playercards = collect();

        //Distribe 3 cards for each user
        foreach ($players as $player)
        {
             for ($i = 0; $i < 3; $i++)
             {
                 $handPlayer = cardUser::create([
                     'card_id' => $cards->random(),
                     'user_id' => $player->id
                 ]);
             }
             $playercards->push($handPlayer);
        }



            return response()->json([$playercards ]);


     /*   return $playercards;*/
    }

    public function showCards()
    {
        $user = auth('sanctum')->user();

        $cards =CardUser::all();

        $cardsCollection = collect();

        foreach($cards as $card)
        {
            $cardsCollection->push($card);
        }
        dd($cardsCollection);
    }



    public function startGame()
    {
        //get Auth User
        $user = auth('sanctum')->user();

        $canPlay = false;


        $userCanPlay = User::where('useCash', '>=', 20)
            ->get();
        dd("ok");
    }

    public function getSumCards()
    {
        //get all users
        $users = User::all();

        //get game Dealer
        $dealer = Game::find(1);

        //collection to collect all values
        $allvalues = collect();

        //for each user => get is Card Value
        foreach ($users as $user) {
            $allvalues->push($user->cards->sum('carValue'));
        }

        dd($allvalues);
        $dealer->cards->sum('carValue');

    }

    /**
     *
     */
    public function game_status(Request $request, $id)
    {

        //id game
        $game = Game::findOrFail($id);

        //id joueur => action
        $users = User::all();

        //check for parameter action and string
        $this->validate($request, [
            "action" => "required|string",
            "id_user" => "required|exists:users_id"
        ]);

        $data = $request->all();
        if ($data["action"] === "hit") {
            //go to state 2
            $userCard = $this->getOneUserCards($id);
            dd($userCard);


        }
        /*else if ($data["action"] === "stand") {

        } else {
            return response()->json(["error" => "action invalid"], 422);
        }*/


        //Next step

    }



}
