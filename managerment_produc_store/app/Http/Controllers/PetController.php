<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Owner;
use 
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $Pets = Pet::paginate(6);
        return view('pets.index', compact('pets'));
    }


    public function create()
    {
        $owners = Owner::all();
        return view('pets.create', compact('owners'));
    }

    public function owner(Request $request)
    {
        $validated = $request->validate([
            'owner_id' => 'required|exists:owners,owner_name',
            'pet_name' => 'required|string|max:255',
            'pet_species' => 'required|string',
            'pet_breed' => 'nullnable|string',
            'pet_age' => 'required|integer|min:1',
        ]);

        $owner = Owner::where('owner_name', $request->owner_id)->first();


        Pet::create([
            'owner_id' => $owner->id,
            'pet_name' => $validated['pet_name'],
            'pet_species' => $validated['pet_species'],
            'pet_breed' => $validated['pet_breed'],
            'pet_age' => $validated['pet_age'],
        ]);
        return redirect()->route('pets.index')
            ->with('success', 'Add pet Success');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }


    public function edit(Pet $pet)
    {
        $owners = Owner::all();
        return view('pets.edit', compact('pet', 'owners'));
    }


    public function update(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'owner_id' => 'required|exists:owners,owner_name',
            'pet_name' => 'required|string|max:255',
            'pet_species' => 'required|string',
            'pet_breed' => 'nullnable|string',
            'pet_age' => 'required|integer|min:1',
        ]);

        $owner = Owner::where('owner_name', $request->owner_id)->first();


        $pet->update([
            'owner_id' => $owner->id,
            'pet_name' => $validated['pet_name'],
            'pet_species' => $validated['pet_species'],
            'pet_breed' => $validated['pet_breed'],
            'pet_age' => $validated['pet_age'],
        ]);

        return redirect()->route('pets.index')
            ->with('success', 'pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')
            ->with('success', 'Pet deleted successfully');
    }
}
