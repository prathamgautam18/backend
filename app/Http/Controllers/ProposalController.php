<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function index()
    {
        return Proposal::with('job', 'freelancer')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'JobID' => 'required|exists:jobs,JobID',
            'FreelancerID' => 'required|exists:freelancers,FreelancerID',
            'ProposalDetails' => 'nullable|string',
            'Amount' => 'nullable|numeric',
        ]);

        return Proposal::create($request->all());
    }

    public function show($id)
    {
        return Proposal::with('job', 'freelancer')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $proposal = Proposal::findOrFail($id);

        $request->validate([
            'JobID' => 'required|exists:jobs,JobID',
            'FreelancerID' => 'required|exists:freelancers,FreelancerID',
            'ProposalDetails' => 'nullable|string',
            'Amount' => 'nullable|numeric',
        ]);

        $proposal->update($request->all());

        return $proposal;
    }

    public function destroy($id)
    {
        $proposal = Proposal::findOrFail($id);
        $proposal->delete();

        return response()->noContent();
    }
}
