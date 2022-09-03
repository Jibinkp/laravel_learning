<?php

namespace App\Http\Controllers;

use App\Models\paymentModel;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function addPayment(Request $request)
    {
        $payment = paymentModel::create($request->all());
        $res = null;
        if ($payment != null) {
            $res['data'] = $payment;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "Payment Added Successfully";
            return response()->json($res);
        } else {
            $res['data'] = $payment;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "Payment faild";
            return response()->json($res);
        }
    }

    public function getAllPayment(Request $request)
    {
        $paymentData = paymentModel::get();
        $res = null;
        if ($paymentData != null) {
            $res['data'] = $paymentData;
            $res['errorCode'] = 200;
            $res['errorMessage'] = "loaded successfully";
            return response()->json($res);
        } else {
            $res['data'] = $paymentData;
            $res['errorCode'] = 300;
            $res['errorMessage'] = "loaded faild";
            return response()->json($res);
        }
    }


    public function updatePayment(Request $request, $id)
    {
        $payment = paymentModel::findOrFail($id);
        // $this->validate($request, [
        //     'varient_title' => 'string|required',
        //     'price' => 'string|nullable',
        //     'stock' => 'string|nullable',
        //     'varient_status' => 'required|in:active,inactive',
        // ]);
        $data = $request->all();
        $status = $payment->fill($data)->save();
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

    public function deletePayment($id)
    {
        $cartInfo = paymentModel::findOrFail($id);
        $status = $cartInfo->delete();

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
