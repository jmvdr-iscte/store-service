<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatchRequest;
use App\Models\Project;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['project' => 'ey'], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request): JsonResponse
    {
        $body = $request->validated();
        
        //download
        $body['download'] = 'https://banana.com';
        $project = Project::create($body);

        return response()->json(['project' => $project], 201);
    }

    public function show(string $uid): JsonResponse
    {
        $project = Project::where('uid', $uid)->first();

        if ($project === null) {
            return response()->json([
                'error' => 'Not Found',
                'message' => "Project with UID {$uid} not found.",
                'status' => 404,
            ], 404);
        }

        return response()->json([
            'data' => $project,
        ]);
    }

    public function update(StorePatchRequest $request, string $uid) :JsonResponse
    {
        $project = Project::where('uid', $uid)->first();
        
        if ($project === null) {
            return response()->json([
                'error' => 'Not Found',
                'message' => "Project with UID {$uid} not found.",
                'status' => 404,
            ], 404);
        }

        $body = $request->validated();
        $project->update($body);

        return response()->json([], 204);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uid)
    {
        $project = Project::where('uid', $uid)->first();
        
        if ($project === null) {
            return response()->json([
                'error' => 'Not Found',
                'message' => "Project with UID {$uid} not found.",
                'status' => 404,
            ], 404);
        }

        if ($project['status'] === 'CANCELED') {
            return response()->json([], 204);   
        }

        $project->status = 'CANCELED';
        $project->save();

        return response()->json([], 204);   
     }
}
