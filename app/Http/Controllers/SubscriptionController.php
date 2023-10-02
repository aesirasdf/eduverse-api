<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Subscription;

class SubscriptionController extends Controller
{

    // GET: /subscriptions
    public function index(){
        $subscriptions = Subscription::all();
        return response()->json(["ok" => true, "message" => "Subscriptions has been retrieved!", "data" => $subscriptions], 200);
    }

    // POST: /subscriptions
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            "name" => ["required", "max:64"],
            "code" => ["required", "unique:subscriptions", "min:8"],
            "expired_at" => ["required", "date", "after:now"]
        ]);

        if($validator->fails()){
            return response()->json(["ok" => false, "errors" => $validator->errors(), "message" => "Request didn't pass the validation."], 400);
        }

        $subscription = Subscription::create($validator->validated());

        return response()->json(["ok" => true, "data" => $subscription, "message" => "Subscription has been created!"], 201);
    }

}
