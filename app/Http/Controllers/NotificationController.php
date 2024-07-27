<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return Notification::with('user')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'UserID' => 'required|integer',
            'NotificationType' => 'required|string|max:50',
            'NotificationMessage' => 'required|string',
            'NotificationDate' => 'required|date',
        ]);

        return Notification::create($request->all());
    }

    public function show($id)
    {
        return Notification::with('user')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::findOrFail($id);

        $request->validate([
            'UserID' => 'required|integer',
            'NotificationType' => 'required|string|max:50',
            'NotificationMessage' => 'required|string',
            'NotificationDate' => 'required|date',
        ]);

        $notification->update($request->all());

        return $notification;
    }

    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        return response()->noContent();
    }
}
