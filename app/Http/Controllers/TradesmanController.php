<?php

namespace App\Http\Controllers;

use App\Tradesman;
use Illuminate\Http\Request;

class TradesmanController extends Controller
{
    public function index()
    {
        $tradesmen = Tradesman::all();
        return view('tradesmen.index', compact('tradesmen'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        auth()->user()->tradesman()->create($attributes);

        return redirect()->route('tradesmen.index');
    }
}
