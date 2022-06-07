<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * BET_START = Variable for Bet to play
     * PUB_CASH = Variable to get cash
     */
    const BET_START = 20;
    const PUB_CASH = 10;

    /**
     * @param Request $request
     * @return \Inertia\Response
     * @throws \Illuminate\Validation\ValidationException
     */
  public function playerBet(Request $request)
  {
      $player = Auth::user();
      $this->validate($request, [
          "action" => "required"
      ]);
      $newCashPlayer = $player->cash - self::BET_START;
      $player->update(["cash" => $newCashPlayer]);

      return Inertia::render('Game');


  }

    /**
     * @param Request $request
     * @return \Inertia\Response
     * @throws \Illuminate\Validation\ValidationException
     */
  public function getCash(Request $request)
  {
      $player = Auth::user();
      $this->validate($request, [
          "action" => "required"
      ]);
      $newCashPlayer = $player->cash +  self::PUB_CASH;
      $player->update(["cash" => $newCashPlayer]);

      return Inertia::render('Video');
  }
}
