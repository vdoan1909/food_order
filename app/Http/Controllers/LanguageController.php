<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request, $language)
    {
        $request->session()->put('language', $language);
        return redirect()->back();
    }
}
