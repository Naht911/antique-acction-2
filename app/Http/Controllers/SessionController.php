<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function index()
    {

        // Nạp trước model User liên quan đến model Session
        $models = ['createdBy', 'endedBy', 'interruptedBy'];

        $auction_session = Session::with($models)->get();
        $product_categories = DB::table('categories')->get();
        $data = [
            'auction_session' => $auction_session,
            'product_categories' => $product_categories
        ];
        // $test = Session::find(1)->createdBy->name;
        // dd($test);

        return Inertia::render('Sessions/Index', $data);
    }
}