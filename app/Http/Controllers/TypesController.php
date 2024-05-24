<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Functions\Helper;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types= Type::all();
        return view('admin.types.index',compact('types'));
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
        $exists= Type::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.type.index')->with('error','tipologia già esistente ');
        }
        else{


            $new= new Type();
            $new->name= $request->name;
            $new->slug=helper:: generateSlug($new->name,new Type);
            $new->save();
            return redirect()->route('admin.type.index',$new);
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
    public function update(Request $request, Type $type)
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
        $exists= Type::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.type.index')->with('error','categoria già esistente ');
        }
        else{

            $val_data['slug']= helper:: generateSlug($request->name, Type::class);
            $type->update($val_data);
            return redirect()->route('admin.type.index')->with('success','tecnologia modificata correttamante');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.type.index')->with('deleted', 'il campo '. $type->name. ' è stato cancellato correttamente ' );
    }

}
