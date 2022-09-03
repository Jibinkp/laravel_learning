<?php

namespace App\Http\Controllers;

use App\Models\pendingModel;
use Illuminate\Http\Request;

class pendingController extends Controller
{
    public function addPending(Request $request)
    {
        $pending = pendingModel::create($request->all());
        $res = null;
        if ($pending != null) {
            $res['data'] = $pending;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "Pending Added Successfully";
            return response()->json($res);
        } else {
            $res['data'] = $pending;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "Payment faild";
            return response()->json($res);
        }
    }

    public function getAllPending(Request $request)
    {
        $pendingData = pendingModel::get();
        $res = null;
        if ($pendingData != null) {
            $res['data'] = $pendingData;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "loaded successfully";
            return response()->json($res);
        } else {
            $res['data'] = $pendingData;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "loaded faild";
            return response()->json($res);
        }
    }

    public function updatePending(Request $request, $id)
    {
        $pending = pendingModel::findOrFail($id);
        // $this->validate($request, [
        //     'varient_title' => 'string|required',
        //     'price' => 'string|nullable',
        //     'stock' => 'string|nullable',
        //     'varient_status' => 'required|in:active,inactive',
        // ]);
        $data = $request->all();
        $status = $pending->fill($data)->save();
        $res = null;
        if ($status != null) {
            $res['data'] = $status;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "Updated Successfully";
            return response()->json($res);
        } else {
            $res['data'] = $status;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "Updation Faild";
            return response()->json($res);
        }
    }

    public function deletePending($id)
    {
        $pendingInfo = pendingModel::findOrFail($id);
        $status = $pendingInfo->delete();

        if ($status != null) {
            $res['data'] = $status;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "Deleted Successfully";
            return response()->json($res);
        } else {
            $res['data'] = $status;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "Deletion Faild";
            return response()->json($res);
        }
    }
}
