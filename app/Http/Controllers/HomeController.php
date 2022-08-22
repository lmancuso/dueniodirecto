<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct() SI LO DESCOMENTO SE LE PASA AUTH AL CONSTRUCTOR PARA QUE INSTANCIE LA SESION
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $properties = new Property;
        //$properties = Property::limit(10)->get(); Si quiero limitar
        $properties = Property::with('images')->orderBy('id', 'desc')->get();
        return view('home')
            ->with('properties', $properties);
    }
}
