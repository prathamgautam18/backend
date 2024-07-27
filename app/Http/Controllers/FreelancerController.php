<?php

namespace App\Http\Controllers;

use App\Models\Freelancer;
use Illuminate\Http\Request;

class FreelancerController extends Controller
{
    public function index()
    {
        return Freelancer::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:freelancers',
            'Phone' => 'nullable|string|max:15',
            'Skills' => 'nullable|string',
            'Rate' => 'nullable|numeric',
        ]);

        return Freelancer::create($request->all());
    }

    public function show($id)
    {
        return Freelancer::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $freelancer = Freelancer::findOrFail($id);

        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:freelancers,Email,' . $freelancer->FreelancerID . ',FreelancerID',
            'Phone' => 'nullable|string|max:15',
            'Skills' => 'nullable|string',
            'Rate' => 'nullable|numeric',
        ]);

        $freelancer->update($request->all());

        return $freelancer;
    }

    public function destroy($id)
    {
        $freelancer = Freelancer::findOrFail($id);
        $freelancer->delete();

        return response()->noContent();
    }
}
