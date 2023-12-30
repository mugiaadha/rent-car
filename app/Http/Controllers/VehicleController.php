<?php

namespace App\Http\Controllers;

use App\Models\VehicleData;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VehicleController extends Controller
{
    public function show(Request $request) {
        $data = VehicleData::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('vd_plat_nomor', 'like', "%{$request->search}%")
                        ->orWhere('vd_model', 'like', "%{$request->search}%")
                        ->orWhere('vd_merk', 'like', "%{$request->search}%");
                }
            )
            ->simplePaginate(20);

        return view('dashboard.vehicle_management', [
            'data' => $data
        ]);
    }

    public function addVehicle() {
        return view('dashboard.add_vehicle');
    }

    public function createVehicle(Request $request) {
        try {
            DB::table('vehicle_data')->insert([
                "vd_plat_nomor" => $request->plat_nomor,
                "vd_merk" => $request->merk,
                "vd_model" => $request->model,
                "vd_tahun" => $request->tahun,
                "vd_tarif" => $request->tarif
            ]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('vehicle-management'));
    }

    public function editVehicle($id) {
        $data = DB::table('vehicle_data')->where('vd_id', $id)->first();

        return view('dashboard.edit_vehicle', [
            'data' => $data
        ]);
    }

    public function updateVehicle(Request $request) {
        try {
            $data = DB::table('vehicle_data')->where('vd_id', $request->id);
            $data->update([
                "vd_plat_nomor" => $request->plat_nomor,
                "vd_merk" => $request->merk,
                "vd_model" => $request->model,
                "vd_tahun" => $request->tahun,
                "vd_tarif" => $request->tarif,
                "vd_status" => $request->status
            ]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('vehicle-management'));
    }

    public function deleteVehicle(Request $request) {
        try {
            $data = DB::table('vehicle_data')->where('vd_id', $request->id);
            $data->delete();
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
        
        return redirect(route('vehicle-management'));
    }
}
