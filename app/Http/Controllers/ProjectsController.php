<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;
use App\Http\Requests\ProjectRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        if(isset($_GET['toSearch'])){
            $projects= Project::where('title','LIKE','%'. $_GET['toSearch'].'%')->get();
        }else{
            $projects= Project::all();
        }

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies=Technology::all();
        return view('admin.projects.create',compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $form_data=$request->all();

        if(array_key_exists('image',$form_data)){
            $img_path=Storage::put('uploads',$form_data['image']);
            $form_data['image']= $img_path;

        }

        $new_project= new Project();
        $form_data['slug']=helper::generateSlug($form_data['title'],new Project);
        $new_project->fill($form_data);

        $new_project->save();

        return redirect()->route('admin.projects.show',$new_project);





    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)

    {
        $technologies=Technology::all();
        return view('admin.projects.edit',compact(['project','technologies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $form_data=$request->all();
        if(isset($form_data['image'])){
            $img_path=Storage::put('uploads',$form_data['image']);
            $form_data['image']= $img_path;

        }


        $form_data['slug']=helper::generateSlug($form_data['title'],new Project);

        $project->update($form_data);
        return redirect()->route('admin.projects.show',compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {


        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
