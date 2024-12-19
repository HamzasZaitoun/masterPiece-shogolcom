<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Models\Job;
use App\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['user', 'job'])->get();
        return view('admin.applicationsTable.index', compact('applications'));
    }

    public function create()
    {
        $users = User::all();
        $jobs = Job::all();
        return view('admin.applicationsTable.create', compact('users', 'jobs'));
    }

    public function store(ApplicationRequest $request)
    {
        Application::create($request->validated());
        return redirect()->route('admin.applications.index')
            ->with('success', 'Application created successfully.');
    }

    public function show($id)
    {
        $application = Application::with(['user', 'job'])->findOrFail($id);
        return view('admin.applicationsTable.show', compact('application'));
    }

    public function edit($id)
    {
        $application = Application::where('application_id', $id)->firstOrFail();
        $users = User::all();
        $jobs = Job::all();
        return view('admin.applicationsTable.update', compact('application', 'users', 'jobs'));
    }

    public function update($id, ApplicationRequest $request)
    {
        $application = Application::where('application_id', $id)->firstOrFail();
        $application->update($request->validated());
        return redirect()->route('admin.applications.index')
            ->with('success', 'Application updated successfully.');
    }
    public function destroy(string $id)
    {
        $application = Application::where('application_id', $id)->first();
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted succefully');
    }
}
