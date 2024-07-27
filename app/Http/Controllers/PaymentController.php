<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return Payment::with('job')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'JobID' => 'required|integer|exists:jobs,JobID',
            'Amount' => 'required|numeric',
            'PaymentDate' => 'required|date',
            'PaymentStatus' => 'required|in:Pending,Completed,Failed',
        ]);
    
        $payment = Payment::create($request->all());
    
        return response()->json($payment, 201);
    }
    
    public function show($id)
    {
        return Payment::with('job')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'JobID' => 'required|exists:jobs,JobID',
            'Amount' => 'required|numeric',
            'PaymentDate' => 'required|date',
            'PaymentStatus' => 'required|in:Pending,Completed,Failed',
        ]);

        $payment->update($request->all());

        return $payment;
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->noContent();
    }
}
