<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //Show all listings
    public function index(){
        return view('Listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->SimplePaginate(6)
        ]);
    }

    //Show single listing
    public function show(Listing $listing){
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
    //Show create form
    public function create(){
        return view('listings.create');
    }

    //Store listing data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        // Set the user_id to the authenticated user's ID
        $formFields['user_id'] = Auth::id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
    }

    //Show edit form
    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {

        // Make sure logged in user is owner
        if ($listing->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $listing->update($formFields);

        return back()->with('message', 'Listing Updated successfully!');
    }
    // Delete Listing
    public function destroy(Listing $listing) {

        // Make sure logged in user is owner
        if ($listing->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted successfully!');
    }

    // Manage Listings
    public function manage() {
    $user = Auth::user()->load('listings');

    return view('listings.manage', [
        'listings' => $user->listings
    ]);
}
}