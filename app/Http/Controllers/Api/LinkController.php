<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LinkResource;
use App\Models\Link;
use App\Models\User;
use App\Services\LinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function __construct(
        protected LinkService $linkService
    ) {}

    /**
     * @param Request $request
     * @param User $user
     * @return LinkResource
     */
    public function create(Request $request, User $user): LinkResource
    {
        $link = $this->linkService->createLinkForUser($user);

        return new LinkResource($link);
    }

    /**
     * @param Request $request
     * @param Link $link
     * @return \Illuminate\Http\JsonResponse
     */
    public function disable(Request $request, Link $link): JsonResponse
    {
        $this->linkService->disable($link);

        return response()->json();
    }
}
