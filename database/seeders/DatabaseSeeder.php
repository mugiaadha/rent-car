<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\UserData::create([
            "ud_nama" => "Mugia Adha Kusumah",
            "ud_alamat" => "jln kemana kek",
            "ud_nomor_telepon" => "085159080404",
            "ud_nomor_sim" => "102938091238",
            "ud_status" => "Y",
            "ud_level" => "admin",
            "ud_username" => "mugiaadha",
            "ud_password" => '$2y$10$BJUzxpT/rIDkaj/ShkQ3uuULZlYyrRgQCiEAUjlYm/yLDO6icJY2a'
        ]);

        $tahun = ['2019', '2020', '2021', '2022', '2023'];
        $merk = ['Honda', 'Toyota', 'Mazda', 'Nissan', 'BMW'];
        $model = ['Civic', 'Supra', 'Rx-8', 'GTR', 'i8'];
        $tarif = ['1000000', '2000000', '3000000', '4000000', '5000000'];

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);

        \App\Models\VehicleData::create([
            "vd_plat_nomor" => "F ".rand(1000,9999)." ".\Str::random(3),
            "vd_tahun" => $tahun[rand(0,4)],
            "vd_merk" => $merk[rand(0,4)],
            "vd_model" => $model[rand(0,4)],
            "vd_tarif" => $tarif[rand(0,4)],
            "vd_status" => 'available',
        ]);
    }
}
