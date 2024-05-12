<?php

use App\Http\Controllers\Api\HeartbeatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post( '/heartbeat', [ HeartbeatController::class, 'store' ] );

Route::get( '/user', function ( Request $request ) {
    return $request->user();
} )->middleware( 'auth:sanctum' );

Route::get( '/status', function ( Request $request ) {
    return response()->json( [
        'status' => 'ok',
        'time'   => date( 'Y-m-d H:i:s' )
    ] );
} );
