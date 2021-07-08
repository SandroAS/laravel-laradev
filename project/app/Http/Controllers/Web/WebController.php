<?php

namespace LaraDev\Http\Controllers\Web;

use Illuminate\Http\Request;
use LaraDev\Http\Controllers\Controller;
use LaraDev\Property;

class WebController extends Controller
{
    public function home()
    {
        $propertiesForSale = Property::sale()->available()->limit(3)->get();
        $propertiesForRent = Property::rent()->available()->limit(3)->get();
        return view('web.home', [
            'propertiesForSale' => $propertiesForSale,
            'propertiesForRent' => $propertiesForRent,
        ]);
    }

    public function rent()
    {
        return view('web.filter');
    }

    public function rentProperty(Request $request)
    {
        $property = Property::where('slug', $request->slug)->first();
        
        return view('web.property', [
            'property' => $property
        ]);
    }

    public function buy()
    {
        return view('web.filter');
    }

    public function buyProperty(Request $request)
    {
        $property = Property::where('slug', $request->slug)->first();
        
        return view('web.property', [
            'property' => $property
        ]);
    }

    public function filter()
    {
        $filter = new FilterController();
        $itemProperties = $filter->createQuery('id');

        foreach ($itemProperties as $property) {
            $properties[] = $property->id;
        }

        if (!empty($properties)) {
            $properties = Property::whereIn('id', $properties)->get();
        } else {
            $properties = Property::all();
        }

        return view('web.filter', [
            //'head' => $head,
            'properties' => $properties,
        ]);
    }

    public function contact()
    {
        return view('web.filter');
    }
}
