@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Ajukan Penyewaan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Ajukan Penyewaan</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Penyewaan</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="{{ route('create-rent-transaction') }}" method="POST">
              @csrf
              <div class="col-md-12">
                <label for="nama" class="form-label">Kendaraan Tersedia</label>
                <select class="form-select select2" aria-label="Default select example required" name="vd_id" required>
                  <option selected value>-- Pilih Mobil Untuk Disewa --</option>
                  @foreach ($availableVehicle as $item)
                    <option value="{{ $item->vd_id }}" @if($item->vd_id == $vehicleId) selected @endif>
                      {{ "$item->vd_plat_nomor -
                        $item->vd_merk -
                        $item->vd_model -
                        $item->vd_tahun
                        (Rp $item->vd_tarif)" }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-4">
                <label for="inputNanme4" class="form-label">Tanggal Sewa</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="1"
                  name="tgl_sewa"
                  value="{{ date('Y-m-d H:i:s') }}"
                  required>
              </div>
              <div class="col-md-4">
                <label for="inputNanme4" class="form-label">Tanggal Kembali</label>
                <input
                  type="date"
                  class="form-control"
                  placeholder="Pilih Tanggal Kembali"
                  name="tgl_kembali"
                  required>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary"
                  onclick="return confirm('Are you sure to create this transaction?')">
                  Submit
                </button>
                <a href="{{ route('rent-car-transaction') }}" type="reset" class="btn btn-secondary">Cancel</a>
              </div>
            </form><!-- End No Labels Form -->
          </div>
        </div>
      </div>
    </div>

  </section>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2();
  });
</script>

@endSection