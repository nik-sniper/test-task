<?php

namespace App\Services;

use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Str;

class LinkService
{
    public function createLinkForUser(User $user): Link
    {
        return Link::create([
            'user_id' => $user->getKey(),
            'expired_at' => now()->addDays(7)
        ]);
    }

    public function disable(Link $link): Link
    {
        $link->expired_at = now();
        $link->save();
        return $link;
    }
}
