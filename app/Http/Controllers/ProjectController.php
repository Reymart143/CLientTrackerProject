<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        //I used paginate to not load all data in just 1 page .
        $query = DB::table('projects');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('client_name', 'like', '%' . $search . '%')
                ->orWhere('project_name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $allowedSorts = ['client_name', 'project_name', 'status', 'priority', 'start_date', 'due_date'];
        $sortBy = in_array($request->sort_by, $allowedSorts) ? $request->sort_by : 'id';
        $sortDirection = $request->sort_direction === 'asc' ? 'asc' : 'desc';

        $projects = $query->orderBy($sortBy, $sortDirection)->paginate(10)->withQueryString();

        return view('projects.index', compact('projects'));
    }
    public function store(Request $request)
    {
        DB::table('projects')->insert([
            'client_name'  => $request->client_name,
            'project_name' => $request->project_name,
            'description'  => $request->description,
            'status'       => $request->status,
            'priority'     => $request->priority,
            'start_date'   => $request->start_date,
            'due_date'     => $request->due_date,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->back()
            ->with('success', 'Project added successfully.');
    }
    public function edit($id)
    {
        $project = DB::table('projects')
            ->where('id', $id)
            ->first();
        if (!$project) {
            return response()->json([
                'message' => 'Project not found.'
            ], 404);
        }
        return response()->json($project);
    }
    public function update(Request $request, $id)
    {
        $project = DB::table('projects')
            ->where('id', $id)
            ->first();
        if (!$project) {
            return redirect()
                ->back()
                ->with('error', 'Project not found.');
        }
        DB::table('projects')
            ->where('id', $id)->update([
                'client_name'  => $request->client_name,
                'project_name' => $request->project_name,
                'description'  => $request->description,
                'status'       => $request->status,
                'priority'     => $request->priority,
                'start_date'   => $request->start_date,
                'due_date'     => $request->due_date,
                'updated_at'   => now(),
            ]);
 
        return redirect()
            ->back()
            ->with('success', 'Project updated successfully.');
    }
     public function delete($id){
        return view('confirm-delete', ['id'=> $id]);
    }

    public function hardDelete($id)
    {
        try {
            $deleted = DB::table('projects')->where('id', $id)->delete();

            if (!$deleted) {
                return redirect()->back()->with('error', 'Project not found!');
            }

            return redirect()->back()->with('success', 'Project Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the Project.');
        }
    }
}
