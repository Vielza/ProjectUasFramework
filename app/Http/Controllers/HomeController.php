<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake; // Import the Cake model
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'user') {
                $cakes = Cake::all(); // Fetch all cakes from the database
                return view('dashboard', compact('cakes'));
            } else if ($usertype == 'admin') {
                $cakes = Cake::all(); // Fetch all cakes from the database
                return view('admin.adminhome', compact('cakes'));
            } else {
                return redirect()->back();
            }
        }
    }
}
