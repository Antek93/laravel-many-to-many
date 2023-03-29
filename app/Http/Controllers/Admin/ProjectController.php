<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


//Models
use App\Models\Category;
use App\Models\Technology;
use App\Models\Type;
//Helpers
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $categories = Category::all();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.index', compact('projects', 'categories', 'types', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('categories', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();

        if (array_key_exists('imagn', $data)) {
            $img_path = Storage::put('project', $data['imagn']);
            $data['imagn'] = $img_path;
        }

        $newProject = Project::create($data);

        if (array_key_exists('technologies', $data)) {
            foreach ($data['technologies'] as $techId) {
                $newProject->technologies()->attach($techId);
            }
        }

        return redirect()->route('admin.projects.show', $newProject)->with('success', 'Progetto aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $technologies = Technology::all();
        return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'categories', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if (array_key_exists('imagn', $data)) {
            $img_path = Storage::put('project', $data['imagn']);
            $data['imagn'] = $img_path;

            if ($project->imagn) {
                Storage::delite($project->imagn);
            }
        }


        $project->update($data);


        if (array_key_exists('projects', $data)) {
            // foreach ($project->technologies as $techId) {
            //     $project->technologies()->detach($techId);
            // }
            // foreach ($data['technologies'] as $techId) {
            //     $project->technologies()->attach($techId);
            // }

            //oppure
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync($data[]);
        }

        $project->technologies()->sync($data['technologies']);

        return redirect()->route('admin.projects.show', $project)->with('success', 'Progetto modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Progetto eliminato con successo');
    }
}
