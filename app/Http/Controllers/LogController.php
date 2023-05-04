<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\LogDetailResource;
use App\Http\Resources\LogResource;
use App\Models\LogModel;
use Illuminate\Http\Request;
use Monolog\LogRecord;

class LogController extends Controller
{
    //
    public function index()
    {
        $log = LogModel::all();
        // return response()->json(['data' => $log]);
        return LogResource::collection($log);
    }
    public function show($id_log)
    {
        $log = LogModel::with('writer:id_user,username')->findOrFail($id_log);
        return new LogDetailResource($log);
    }

    public function show2($id_log)
    {
        $log = LogModel::findOrFail($id_log);
        return new LogDetailResource($log);
    }
}
