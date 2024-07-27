<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index()
    {
        return Rating::with('job', 'client', 'freelancer')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'JobID' => 'required|exists:jobs,JobID',
            'ClientID' => 'required|exists:clients,ClientID',
            'FreelancerID' => 'required|exists:freelancers,FreelancerID',
            'RatingValue' => 'required|integer|between:1,5',
            'Comment' => 'nullable|string',
        ]);

        return Rating::create($request->all());
    }

    public function show($id)
    {
        return Rating::with('job', 'client', 'freelancer')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::findOrFail($id);

        $request->validate([
            'JobID' => 'required|exists:jobs,JobID',
            'ClientID' => 'required|exists:clients,ClientID',
            'FreelancerID' => 'required|exists:freelancers,FreelancerID',
            'RatingValue' => 'required|integer|between:1,5',
            'Comment' => 'nullable|string',
        ]);

        $rating->update($request->all());

        return $rating;
    }

    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $rating->delete();

        return response()->noContent();
    }
}
