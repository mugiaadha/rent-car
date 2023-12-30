@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Vehicle</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Edit Vehicle</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Data</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="{{ route('update-vehicle', ['id' => $data->vd_id]) }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $data->vd_id }}">
              <div class="col-md-12">
                <label for="nama" class="form-label">Plat Nomor Kendaraan</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="F 12345 GHJ"
                    name="plat_nomor"
                    value="{{ $data->vd_plat_nomor }}"
                    required>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Merk Kendaraan</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Honda, Audi, Toyota"
                  name="merk"
                  value="{{ $data->vd_merk }}"
                  required>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Model</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="sedan, jeep, suv, mvp"
                  name="model"
                  value="{{ $data->vd_model }}"
                  required>
              </div>
              <div class="col-md-3">
                <label for="inputNanme4" class="form-label">Tahun Dibuat</label>
                <input
                type="text"
                class="form-control"
                placeholder="tahun pembuatan"
                name="tahun"
                value="{{ $data->vd_tahun }}"
                required>
              </div>
              <div class="col-md-4">
                <label for="inputNanme4" class="form-label">Tarif Sewa Perhari</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="tarif per hari"
                  name="tarif"
                  value="{{ $data->vd_tarif }}"
                  required>
              </div>
              <div class="col-md-4">
                <label for="inputStatus" class="form-label">Status</label>
                <select id="inputStatus" class="form-select" name="status">
                  <option {{ $data->vd_status == 'Y' ? 'selected' : '' }} value="Y">Active</option>
                  <option {{ $data->vd_status == 'N' ? 'selected' : '' }} value="N">Inactive</option>
                  <option {{ $data->vd_status == 'D' ? 'selected' : '' }} value="D">Rented</option>
                </select>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary"
                  onclick="return confirm('Are you sure to edit this data?')">
                  Submit
                </button>
                <a href="/auth/vehicle-management" type="reset" class="btn btn-secondary">Cancel</a>
              </div>
            </form><!-- End No Labels Form -->
          </div>
        </div>
      </div>
    </div>

  </section>
</main>
@endSection