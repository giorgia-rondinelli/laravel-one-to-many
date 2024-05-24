<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Functions\Helper;


class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies= Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $exists= Technology::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technology.index')->with('error','categoria già esistente ');
        }
        else{


            $new= new Technology();
            $new->name= $request->name;
            $new->slug=helper:: generateSlug($new->name,new Technology);
            $new->save();
            return redirect()->route('admin.technology.index',$new);
        }






    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {

        $val_data=$request->validate([
            'name'=>'required|min:2|max:20'
        ],[
            'name.required'=> 'iserire nome tecnologia',
            'name.min'=> 'almeno 2 caratteri',
            'name.max'=> 'massimo 20 caratteri'

        ]
        );
       ;
        $exists= Technology::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technology.index')->with('error','categoria già esistente ');
        }
        else{

            $val_data['slug']= helper:: generateSlug($request->name, Technology::class);
            $technology->update($val_data);
            return redirect()->route('admin.technology.index')->with('success','tecnologia modificata correttamante');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technology.index')->with('deleted', 'il campo' . $technology->name. ' è stato cancellato correttamente ' );
    }
}
