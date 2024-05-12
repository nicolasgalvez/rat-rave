<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Heartbeat;
use Illuminate\Http\Request;

class HeartbeatController extends Controller
{
    /**
     * Store a new heartbeat.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'device_id' => 'required|integer',
//            'device_time' => 'sometimes|date',
//            'status' => 'required|string'
//        ]);


        $heartbeat = Heartbeat::create($request->all());

        return response()->json($heartbeat, 201);
    }
}
