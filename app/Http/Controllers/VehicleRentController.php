<?php

namespace App\Http\Controllers;

use App\Models\VehicleRentData;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleRentController extends Controller
{
    public function show(Request $request) {
        $data = VehicleRentData::query()
            ->join('vehicle_data', 'vrd_vd_id', '=', 'vd_id')
            ->join('user_data', 'vrd_ud_id', '=', 'ud_id')
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('vrd_transaction_number', 'like', "%{$request->search}%")
                        ->orWhere('vd_plat_nomor', 'like', "%{$request->search}%")
                        ->orWhere('vd_merk', 'like', "%{$request->search}%")
                        ->orWhere('ud_nama', 'like', "%{$request->search}%");
                }
            )
            ->groupBy('vrd_id')
            ->simplePaginate(20);

        return view('dashboard.vehicle_rent_management', [
            'data' => $data
        ]);
    }

    public function addRentTransaction() {
        $availableVehicle = DB::table('vehicle_data')->where('vd_status', 'Y')->get();

        return view('dashboard.add_rent', [
            "availableVehicle" => $availableVehicle
        ]);
    }

    public function createRentTransaction(Request $request) {
        try {
            DB::table('vehicle_rent_data')->insert([
                "vrd_transaction_number" => $this->generateTrxId(),
                "vrd_total_hari_sewa" => $request->total_hari,
                "vrd_estimated_until_date" => $this->generateEstimatedUntil($request->total_hari),
                "vrd_ud_id" => session('user_data')->ud_id,
                "vrd_vd_id" => $request->vd_id,
                "vrd_status" => "D"
            ]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('rent-car-transaction'));
    }

    public function approveRent($id) {
        try {
            $rentData = DB::table('vehicle_rent_data')->where('vrd_id', $id);
            $vehicleData = DB::table('vehicle_data')->where('vd_id', $rentData->first()->vrd_vd_id);
            $rentData->update(["vrd_status" => "Y"]);
            $vehicleData->update(["vd_status" => "D"]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }

        return redirect(route('rent-car-transaction'));
    }

    private function generateTrxId(){
        return 'RENT-'.date('Ymd').'-'.rand(1, 9999);
    }

    private function generateEstimatedUntil($count) { 
        $date=date_create("now");
        date_add($date,date_interval_create_from_date_string($count."days"));
        return date_format($date,"Y-m-d");
    }
}
