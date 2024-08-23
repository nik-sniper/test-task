<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Services\LinkService;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * @param RegisterRequest $request
     * @param UserService $userService
     * @param LinkService $linkService
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request, UserService $userService, LinkService $linkService): RedirectResponse
    {
        $user = $userService->create($request->all());

        $link = $linkService->createLinkForUser($user);

        return back()->with([
            'link' => route('link.show', ['link' => $link->getKey()])
        ]);
    }
}
