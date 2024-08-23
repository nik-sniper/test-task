<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResultResource;
use App\Models\User;
use App\Services\GameResultService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GameResultController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(User $user): AnonymousResourceCollection
    {
        return GameResultResource::collection(
            $user->gameResults()->latest()->take(3)->get()
        );
    }

    public function create(User $user, GameResultService $gameResultService): GameResultResource
    {
        $gameResult = $gameResultService->createGameResult($user);

        return new GameResultResource($gameResult);
    }
}
