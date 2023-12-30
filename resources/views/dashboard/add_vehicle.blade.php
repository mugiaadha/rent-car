@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Vehicle</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Add Vehicle</li>
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
            <form class="row g-3" action="{{ route('create-vehicle') }}" method="POST">
              @csrf
              <div class="col-md-12">
                <label for="nama" class="form-label">Plat Nomor Kendaraan</label>
                <input
                    type="text"
                    class="form-control"
                    placeholder="F 12345 GHJ"
                    name="plat_nomor"
                    required>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Merk Kendaraan</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Honda, Audi, Toyota"
                  name="merk"
                  required>
              </div>
              <div class="col-md-6">
                <label for="inputNanme4" class="form-label">Model</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="sedan, jeep, suv, mvp"
                  name="model"
                  required>
              </div>
              <div class="col-md-3">
                <label for="inputNanme4" class="form-label">Tahun Dibuat</label>
                <input
                type="text"
                class="form-control"
                placeholder="tahun pembuatan"
                name="tahun"
                required>
              </div>
              <div class="col-md-4">
                <label for="inputNanme4" class="form-label">Tarif Sewa Perhari</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="tarif per hari"
                  name="tarif"
                  required>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary">
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