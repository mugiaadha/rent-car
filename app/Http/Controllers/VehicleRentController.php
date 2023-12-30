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
            ->selectRaw("
                vrd_transaction_number,
                ud_nama,
                vd_merk,
                vd_model,
                vd_plat_nomor,
                DATE_FORMAT(vrd_rent_date, '%d %M %Y') as rent_date,
                DATE_FORMAT(vrd_estimated_until_date, '%d %M %Y') as estimated_until_date,
                vrd_status,
                vrd_id
            ")
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
            ->orderBy('vrd_id', 'desc')
            ->simplePaginate(20);

        return view('dashboard.vehicle_rent_management', [
            'data' => $data
        ]);
    }

    public function addRentTransaction($vehicleId = null) {
        $availableVehicle = DB::table('vehicle_data')->where('vd_status', 'available')->get();

        return view('dashboard.add_rent', [
            "availableVehicle" => $availableVehicle,
            "vehicleId" => $vehicleId
        ]);
    }

    public function createRentTransaction(Request $request) {
        try {
            if (strtotime($request->tgl_sewa) > strtotime($request->tgl_kembali)) {
                $this->alert('tanggal sewa dan tanggal kembali salah!');
            }

            $data = VehicleRentData::query()
                ->where('vrd_status','D')
                ->whereBetween(DB::raw($request->tgl_sewa), [$request->tgl_sewa, $request->tgl_kembali])
                ->first();

            if ($data) {
                $this->alert('tanggal sewa dan tanggal kembali salah!');
            }

            DB::table('vehicle_rent_data')->insert([
                "vrd_transaction_number" => $this->generateTrxId(),
                "vrd_total_hari_sewa" => $this->countDays($request->tgl_sewa, $request->tgl_kembali),
                "vrd_rent_date" => $request->tgl_sewa,
                "vrd_estimated_until_date" => $request->tgl_kembali,
                "vrd_ud_id" => session('user_data')->ud_id,
                "vrd_vd_id" => $request->vd_id,
                "vrd_status" => "D"
            ]);

            return redirect(route('rent-car-transaction'));
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }
    }

    public function approveRent($id) {
        try {
            $rentData = DB::table('vehicle_rent_data')->where('vrd_id', $id);
            $vehicleData = DB::table('vehicle_data')->where('vd_id', $rentData->first()->vrd_vd_id);
            $rentData->update(["vrd_status" => "Y"]);
            $vehicleData->update(["vd_status" => "rented"]);
        } catch (\Throwable $ex) {
            throw new Exception($ex);
        }

        return redirect(route('rent-car-transaction'));
    }

    private function generateTrxId(){
        return 'RENT-'.date('Ymd').'-'.rand(1, 9999);
    }

    private function countDays($date1, $date2) { 
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->days;
    }

    private function alert($message){
        die("<script type='text/javascript'>
                window.alert('$message');
                window.location.href='/login';
            </script>");
    }
}
