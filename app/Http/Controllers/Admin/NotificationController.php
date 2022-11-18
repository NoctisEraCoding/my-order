<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\PreconditionFailedApi;
use App\Exceptions\ResourcesNotFoundApi;
use App\Http\Controllers\Controller;
use App\Http\HelperApi;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    /**
     * @throws PreconditionFailedApi|ResourcesNotFoundApi
     */
    public function postReadNotification(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|int'
        ]);

        if ($validator->fails()) {
            throw new PreconditionFailedApi();
        }

        $notification = Notification::find($request->id);

        if(!$notification){
            throw new ResourcesNotFoundApi();
        }

        $notification->read = 1;
        $notification->save();

        return HelperApi::successResponse();
    }

    /*public function postNewNotification(Request $request){
        return Notification::createNotification(11, $request->message);
    }*/
}
