@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Rent</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Add Rent</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Data</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="{{ route('create-rent-transaction') }}" method="POST">
              @csrf
              <div class="col-md-12">
                <label for="nama" class="form-label">Kendaraan Tersedia</label>
                <select class="form-select" aria-label="Default select example required" name="vd_id" required>
                  <option selected value>-- Pilih Mobil Untuk Disewa --</option>
                  @foreach ($availableVehicle as $item)
                    <option value="{{ $item->vd_id }}">
                      {{ "$item->vd_plat_nomor -
                        $item->vd_merk -
                        $item->vd_model -
                        $item->vd_tahun
                        (Rp $item->vd_tarif)" }}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Total Hari Sewa</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="1"
                  name="total_hari"
                  value="1"
                  min="1"
                  required>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Pembayaran</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="pembayaran"
                  readonly
                  value="Cash"
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
@endSection