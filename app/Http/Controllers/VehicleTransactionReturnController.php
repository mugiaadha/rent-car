<?php

namespace App\Http\Controllers;

use App\Models\VehicleRentData;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleTransactionReturnController extends Controller
{
    public function show(Request $request) {
        $data = VehicleRentData::query()
            ->join('vehicle_data', 'vrd_vd_id', '=', 'vd_id')
            ->join('user_data', 'vrd_ud_id', '=', 'ud_id')
            ->leftJoin('vehicle_transaction_return_data', 'vtrd_vrd_id', '=', 'vrd_id')
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('vrd_transaction_number', 'like', "%{$request->search}%")
                        ->orWhere('vd_plat_nomor', 'like', "%{$request->search}%")
                        ->orWhere('vd_merk', 'like', "%{$request->search}%")
                        ->orWhere('ud_nama', 'like', "%{$request->search}%");
                }
            )
            ->where('vrd_status', 'Y')
            ->simplePaginate(20);

        return view('dashboard.vehicle_transacation_return_management', [
            'data' => $data
        ]);
    }

    public function approveReturn($id) {
        $data = VehicleRentData::query()
            ->join('vehicle_data', 'vrd_vd_id', '=', 'vd_id')
            ->join('user_data', 'vrd_ud_id', '=', 'ud_id')
            ->where('vrd_id', $id)
            ->first();

        return view('dashboard.return_car_transaction', [
            'data' => $data
        ]);
    }

    public function doApproveReturn(Request $request) {

        $data = VehicleRentData::query()
            ->join('vehicle_data', 'vrd_vd_id', '=', 'vd_id')
            ->join('user_data', 'vrd_ud_id', '=', 'ud_id')
            ->where('vrd_id', $request->rent_id)
            ->first();

        $vehicleData = DB::table('vehicle_data')->where('vd_id', $data->vd_id);
        $vehicleData->update(["vd_status" => "Y"]);

        DB::table('vehicle_transaction_return_data')->insert([
            'vtrd_vrd_id' => $request->rent_id,
            'vtrd_status' => 'Y',
            'vtrd_payment_amount' => $request->total_sewa
        ]);

        return redirect(route('return-car-transaction'));
    }
}
