<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\Price;
use App\Models\Image;
use Auth;
use ImageIntervention;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new_property');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePropertyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $type      = $request->type;
        $operation = $request->operation;
  
        $property = new Property();
        $property->description = $request->description;
        $property->type = $type;
        $property->operation = $operation;
        $property->active = 1;
        $property->user_id = auth()->user()->id;
        $property->save();

        $price = new Price();
        $price->property_id = $property->id;
        $price->price = $request->price;
        $price->position = 1;
        $price->save();

        $order = 1;
        if($request->hasfile('images')){
            foreach($request->file('images') as $file)
            {
                //image es la instancia del modelo Image
                $image = new Image;
                $name = time().rand(1,100) .'.' . $file->extension();
                $image->order = $order++;
                $image->property_id = $property->id;

                // $path = $file->storeAs(
                //     'public/images', $name );
                // dd( $path );

                // img es la instancia para ImageIntervention
                $img = ImageIntervention::make( $file );
                $img->resize( 300, 300 );
                $img->save(storage_path('app/public/images/' . $name));
                $image->path  = $img->basename;
                $image->save();

            }
        }

        return redirect('new_property');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('show_property', [
            'property' => $property
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePropertyRequest  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
