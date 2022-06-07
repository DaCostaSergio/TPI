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

class Gamecontroller extends Controller
{

    /**
     * Function create id Game and Card
     * @return void
     */
    public function create()
    {
        $game = Game::create('game_id');
        $cards = Card::create();

    }

    /**
     * Function get Card for Auth User
     * @return mixed
     */
    public function getOneUserCards()
    {

        dd(auth('sanctum')->user());
        return auth('sanctum')->user()->cards;
    }


    /**
     * Get the server Cards
     * @return \Illuminate\Support\Collection
     */
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

    /**
     * Get Player Cards
     * @return \Illuminate\Http\JsonResponse
     */
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
    }

    /**
     * Display Cards
     * @return void
     */
    public function showCards()
    {

        //Auth User
        $user = auth('sanctum')->user();

        //Card User
        $cards =CardUser::all();

        //Collection for Cards
        $cardsCollection = collect();

        //Push cards to collection
        foreach($cards as $card)
        {
            $cardsCollection->push($card);
        }
        dd($cardsCollection);
    }


    /**
     * Function Start Game
     * @return void
     */
    public function startGame()
    {
        //get Auth User
        $user = auth('sanctum')->user();

        //Get User where cash is bigger than Bet Cash
        $userCanPlay = User::where('useCash', '>=', 20)
            ->get();
    }

    /**
     * Function Get Sum cards value
     * @return void
     */
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



}
