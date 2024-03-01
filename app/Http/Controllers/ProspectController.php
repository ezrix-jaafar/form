<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prospect;
use App\Models\SalesRep;

class ProspectController extends Controller
{
    public function store(Request $request)
{
    $prospect = new Prospect;

    $prospect->name = $request->name;
    $prospect->phone = $request->phone;
    $prospect->email = $request->email;
    $prospect->state = $request->state;
    $prospect->brand_name = $request->brand_name;
    $prospect->business_type = $request->business_type;
    $prospect->role = $request->role;
    $prospect->last_30days_sales = $request->last_30days_sales;

    // Retrieve all SalesRep models ordered by id
    $salesReps = \App\Models\SalesRep::orderBy('id')->get();

    // Retrieve the last assigned SalesRep model
    $lastAssignedSalesRep = \App\Models\Prospect::latest('sales_rep_id')->first();

    // If there are no prospects yet, assign the first sales rep
    if ($lastAssignedSalesRep === null) {
        $nextSalesRep = $salesReps[0];
    } else {
        // Find the index of the last assigned SalesRep model in the salesReps collection
        $lastAssignedIndex = $salesReps->search(function ($salesRep) use ($lastAssignedSalesRep) {
            return $salesRep->id == $lastAssignedSalesRep->sales_rep_id;
        });

        // If the last assigned SalesRep model is the last one in the salesReps collection, assign the first one, otherwise assign the next one
        $nextSalesRep = $salesReps[$lastAssignedIndex + 1] ?? $salesReps[0];
    }

    // Assign the next SalesRep model to the prospect
    $prospect->sales_rep_id = $nextSalesRep->id;

    $prospect->save();

    // Prepare the form data
    $formData = [
        'Name' => $request->name,
        'Phone' => $request->phone,
        'Email' => $request->email,
        'State' => $request->state,
        'Brand Name' => $request->brand_name,
        'Business Type' => $request->business_type,
        'Role' => $request->role,
        'Last 30 Days Sales' => $request->last_30days_sales,
    ];

    // Convert the form data to a URL-encoded string
    $formDataString = http_build_query($formData);

    // Replace '&' with '%0a' to create new lines in the WhatsApp message
    $formDataString = str_replace(['=', '&'], [': ', '%0a'], $formDataString);

    // Generate the WhatsApp link
    $whatsappLink = 'https://api.whatsapp.com/send?phone=' . $nextSalesRep->whatsapp . '&text=' . $formDataString;

    // Create a new response and set the Location header
    return response('', 302, ['Location' => $whatsappLink]);
}

    public function create()
    {
        return view('create');
    }
}
