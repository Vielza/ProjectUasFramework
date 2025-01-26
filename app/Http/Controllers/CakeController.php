<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class CakeController extends Controller
{
    public function index()
    {
        $cakes = Cake::all();
        return view('dashboard', compact('cakes'));
    }

    public function show($id)
    {
        $cake = Cake::findOrFail($id);
        $likes = Like::where('cake_id', $id)->where('like', true)->count();
        $dislikes = Like::where('cake_id', $id)->where('like', false)->count();
        return view('cakes.show', compact('cake', 'likes', 'dislikes'));
    }

    public function like($id)
    {
        $cake = Cake::findOrFail($id);
        $like = Like::updateOrCreate(
            ['cake_id' => $cake->id, 'user_id' => Auth::id()],
            ['like' => true]
        );
        return redirect()->back();
    }

    public function dislike($id)
    {
        $cake = Cake::findOrFail($id);
        $like = Like::updateOrCreate(
            ['cake_id' => $cake->id, 'user_id' => Auth::id()],
            ['like' => false]
        );
        return redirect()->back();
    }
}
