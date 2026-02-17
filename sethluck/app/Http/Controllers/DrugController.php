<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController extends Controller
{
    public function add(Request $request)
    {
        $validated = $request->validate([
            'drugname' => 'required|min:3|max:50',
            'quentity' => 'required|numeric|regex:/^\d+$/',
            'unitprice' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);


        $result = Drug::create([
            'drugname' => $request->drugname,
            'quantity' => $request->quentity,
            'unitprice' => $request->unitprice
        ]);

        if ($result) {
            return redirect()->route('drug_add')->with('success', 'Product added successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to add product.');
        }

    }

    public function update(Request $request)
    {

        // Find the drug by ID
        $drug = Drug::findOrFail($request->drugid);

        // return $drug;

        // Validate incoming data
        $validated = $request->validate([
            'drugname' => 'required|min:3|max:50',
            'quantity' => 'required|numeric|regex:/^\d+$/',
            'unitprice' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        // Update the drug record with the validated data
        $drug->drugname = $validated['drugname'];
        $drug->quantity = $validated['quantity'];
        $drug->unitprice = $validated['unitprice'];

        // Save the updated record
        $drug->save();

        // Redirect with a success message or back to the page
        return redirect()->route('inventory_of_drugs')->with('success', 'Drug updated successfully.');


    }

    public function view(Request $request)
    {
        $validated = $request->validate([
            'drugname' => 'required|string|min:3|max:20'
        ]);

        // return $validated;

        $searchpara = $request->drugname;



        $results = Drug::where('drugname', 'like', '%' . $searchpara . '%')->get();



        if ($results) {
            return view('inventory_of_drugs', compact('results'));
        } else {
            redirect()->back()->with('error', 'No Data found');
        }

    }

    public function edit(Request $request)
    {

        $result = Drug::where('drugid', $request->drugid)->first();

        // return $result;
        return view('drug_update', compact('result'));

    }

}
