<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\FcmTrait;
class NotificationController extends Controller
{
    use FcmTrait;
    public function create()
    {
        return view('pages.notifications.create');
    }

    public function store(Request $request)
    {
        
        $this->sendToTopic($request,'users');
       
        if (true) {
            $return = ["result" => "ok", "message" => admin("Add Operation Successfully")];
        } else {
            $return = ["result" => "error", "message" => admin("Add Operation Failed")];
        }
        return $return;
    }
}
