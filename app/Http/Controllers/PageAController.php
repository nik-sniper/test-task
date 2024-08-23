<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PageAController extends Controller
{
    public function show(Link $link): View
    {
        return view('page', [
            'link' => $link
        ]);
    }
}
