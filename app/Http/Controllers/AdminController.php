<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Cake;

class AdminController extends Controller
{
    public function index()
    {
        $likes = Like::where('like', true)->count() ?? 0;
        $dislikes = Like::where('like', false)->count() ?? 0;

        return view('admin.adminhome', compact('likes', 'dislikes'));
    }

    public function create()
    {
        return view('admin.add-data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'recipe' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Cake::create([
            'name' => $request->name,
            'image' => $imageName,
            'recipe' => $request->recipe,
        ]);

        return redirect()->route('adminhome')->with('success', 'Cake added successfully');
    }

    public function edit($id)
    {
        $cake = Cake::findOrFail($id);
        return view('admin.edit-cake', compact('cake'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'recipe' => 'required|string',
        ]);

        $cake = Cake::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $cake->image = $imageName;
        }

        $cake->update([
            'name' => $request->name,
            'recipe' => $request->recipe,
        ]);

        return redirect()->route('adminhome')->with('success', 'Cake updated successfully');
    }

    public function destroy($id)
    {
        $cake = Cake::findOrFail($id);
        $cake->delete();

        return redirect()->route('adminhome')->with('success', 'Cake deleted successfully');
    }

    public function cakeData()
    {
        $cakes = Cake::all();
        return view('admin.cake-data', compact('cakes'));
    }
}