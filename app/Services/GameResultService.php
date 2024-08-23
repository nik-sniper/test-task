<?php

namespace App\Services;

use App\Enums\Result;
use App\Models\GameResult;
use App\Models\User;

class GameResultService
{
    public function createGameResult(User $user): GameResult
    {
        $number = random_int(1, 1000);

        $result = match ($number % 2 === 0) {
            true => Result::WIN,
            false => Result::LOSE
        };

        return GameResult::create([
            'user_id' => $user->getKey(),
            'number' => $number,
            'result' => $result,
            'win_sum' => $result === Result::WIN ? $this->calculateWinSum($number) : 0
        ]);
    }

    protected function calculateWinSum(int $number): float
    {
        if ($number > 900) {
            $amount = $number * 0.7;
        } elseif ($number > 600) {
            $amount = $number * 0.5;
        } elseif ($number > 300) {
            $amount = $number * 0.3;
        } elseif ($number > 0) {
            $amount = $number * 0.1;
        } else {
            $amount = 0;
        }

        return $amount;
    }
}
