<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Notification;

class NotificationController extends Controller
{
    public function readAll(Request $request) {
        // explode "http://127.0.0.1:8000/admin/notification/read-all?comment.show" base on ?
        // get "comment.show"
        // generate "admin.comment.show"
        $redirectTo = explode('?', $request->getRequestUri());
        $redirectTo = $redirectTo[array_key_last($redirectTo)];
        $redirectTo = 'admin.' . $redirectTo;

        $notifications = Notification::all();
        foreach ($notifications as $notification)
            $notification->update([
                'read_at' => now(),
            ]);

        return to_route($redirectTo);
    }
}
