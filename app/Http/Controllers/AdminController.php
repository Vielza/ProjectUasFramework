<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\likedislikeChart; // Import the likedislikeChart class
use App\Models\Cake;

class AdminController extends Controller
{
    public function index(likedislikeChart $chart)
    {
        $chart = $chart->build();
        return view('home', compact('chart'));
    }

    public function create()
    {
        return view('admin.add-data');
    }

    public function store(Request $request)
    {
        // Validate and store the data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'recipe' => 'required|string',
        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
        }

        // Save the data to the database
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
        // Validate and update the data
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'recipe' => 'required|string',
        ]);

        $cake = Cake::findOrFail($id);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $cake->image = $imageName;
        }

        // Update the data in the database
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
}