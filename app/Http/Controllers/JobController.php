<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return Job::with('client', 'freelancer', 'proposals', 'payments', 'ratings')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required|string|max:100',
            'Description' => 'nullable|string',
            'Budget' => 'nullable|numeric',
            'Deadline' => 'nullable|date',
            'Location' => 'nullable|string|max:100',
            'Salary' => 'nullable|numeric',
            'JobType' => 'nullable|string|max:50',
            'Skills' => 'nullable|string',
            'ClientID' => 'required|exists:clients,ClientID',
            'FreelancerID' => 'nullable|exists:freelancers,FreelancerID',
        ]);

        return Job::create($request->all());
    }

    public function show($id)
    {
        return Job::with('client', 'freelancer', 'proposals', 'payments', 'ratings')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $request->validate([
            'Title' => 'required|string|max:100',
            'Description' => 'nullable|string',
            'Budget' => 'nullable|numeric',
            'Deadline' => 'nullable|date',
            'Location' => 'nullable|string|max:100',
            'Salary' => 'nullable|numeric',
            'JobType' => 'nullable|string|max:50',
            'Skills' => 'nullable|string',
            'ClientID' => 'required|exists:clients,ClientID',
            'FreelancerID' => 'nullable|exists:freelancers,FreelancerID',
        ]);

        $job->update($request->all());

        return $job;
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return response()->noContent();
    }
}
