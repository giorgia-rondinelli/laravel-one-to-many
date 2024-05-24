<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Functions\Helper;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $projects= Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data=$request->all();

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
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $form_data=$request->all();


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
