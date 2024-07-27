<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return Admin::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:admins',
            'Phone' => 'nullable|string|max:15',
        ]);

        return Admin::create($request->all());
    }

    public function show($id)
    {
        return Admin::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'Name' => 'required|string|max:100',
            'Email' => 'required|string|email|max:100|unique:admins,Email,' . $admin->AdminID . ',AdminID',
            'Phone' => 'nullable|string|max:15',
        ]);

        $admin->update($request->all());

        return $admin;
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return response()->noContent();
    }
}
