<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebProspect;
use App\Models\WebSalesRep;

class WebProspectController extends Controller
{
    public function store(Request $request)
    {
        $prospect = new WebProspect;

        $prospect->name = $request->name;
        $prospect->phone = $request->phone;
        $prospect->email = $request->email;
        $prospect->state = $request->state;
        $prospect->brand_name = $request->brand_name;
        $prospect->business_type = $request->business_type;
        $prospect->role = $request->role;
        $prospect->last_30days_sales = $request->last_30days_sales;
        $prospect->website_type = $request->website_type; // Added this line

        $salesReps = \App\Models\WebSalesRep::orderBy('id')->get();

        $lastAssignedSalesRep = \App\Models\WebProspect::latest('web_sales_rep_id')->first();

        if ($lastAssignedSalesRep === null) {
            $nextSalesRep = $salesReps[0];
        } else {
            $lastAssignedIndex = $salesReps->search(function ($salesRep) use ($lastAssignedSalesRep) {
                return $salesRep->id == $lastAssignedSalesRep->web_sales_rep_id;
            });

            $nextSalesRep = $salesReps[$lastAssignedIndex + 1] ?? $salesReps[0];
        }

        $prospect->web_sales_rep_id = $nextSalesRep->id;

        $prospect->save();

        $formData = [
            'Name' => $request->name,
            'Phone' => $request->phone,
            'Email' => $request->email,
            'State' => $request->state,
            'Brand Name' => $request->brand_name,
            'Business Type' => $request->business_type,
            'Role' => $request->role,
            'Last 30 Days Sales' => $request->last_30days_sales,
            'Website Type' => $request->website_type, // Added this line
        ];

        $formDataString = http_build_query($formData);

        $formDataString = str_replace(['=', '&'], [': ', '%0a'], $formDataString);

        $whatsappLink = 'https://api.whatsapp.com/send?phone=' . $nextSalesRep->whatsapp . '&text=' . $formDataString;

        return response('', 302, ['Location' => $whatsappLink]);
    }

    public function create()
    {
        return view('webprospect_create');
    }
}
