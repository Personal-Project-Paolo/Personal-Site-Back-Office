<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Technology;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // gestione parametro q (parametro di ricerca)
        $searchStr = $request->query('q', '');

        $projects = Project::with('type', 'technologies')->where('title', 'LIKE', "%{$searchStr}%")->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        return response()->json([
            'success' => true,
            'results' => $project,
        ]);
    }
}
