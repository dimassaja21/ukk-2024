<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $buku = Buku::all();
        return view('home', compact('buku'));
    }
}
