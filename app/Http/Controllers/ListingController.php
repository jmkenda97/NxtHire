<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //show all listing
    public function index(){
        return view('listings.index',[
        'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
    ]);
    }
  //show listing single
    public function show(Listing $listing){
             
      return view('listings.show',[
        'listing' =>  $listing
    ]);
    }

    
   //create listing
    public function create(){
        return view('listings.create');

    }

    //store listing
s    public function store(Request $request){

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        $formFields['tags'] = is_array($formFields['tags']) ? implode(',', $formFields['tags']) : $formFields['tags'];

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
            
        }
        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);

        return redirect('/')->with('message', 'listing is created successfull !');

    }

    //show edit form
    public function edit(listing $listing){
        return view('listings.edit', ['listing' =>$listing]);
    }
     
   
    //update list
    public function update(Request $request,listing $listing){
        //make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',
        ]);
        $formFields['tags'] = is_array($formFields['tags']) ? implode(',', $formFields['tags']) : $formFields['tags'];

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');

        }

        $listing->update($formFields);

        return back()->with('message', 'listing is update successfull !');

    }

    //delete listing
    public function delete(listing $listing){
         //make sure logged in user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message', 'Listing is deleted successfully');

    }

    //manage listings
   public function manage()
{
    return view('listings.manage', [
        'listings' => auth()->user()->listings()->get()
    ]);
}


}
