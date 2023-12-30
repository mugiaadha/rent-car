@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit User</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Edit User</li>
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
            <form class="row g-3" action="{{ route('update-user', ['id' => $data->ud_id]) }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{ $data->ud_id }}">

              <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Nama Lengkap</label>  
                <input
                    type="text"
                    class="form-control"
                    placeholder="nama lengkap"
                    name="nama"
                    value="{{ $data->ud_nama }}"
                    required>
              </div>
              <div class="col-12">
                <textarea
                  name="alamat"
                  cols="30"
                  rows="10"
                  class="form-control"
                  placeholder="address"
                  style="height:100px;">{{ $data->ud_alamat }}</textarea>
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Nomor SIM</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="no. sim"
                  name="nomor_sim"
                  value="{{ $data->ud_nomor_sim }}"
                  required>
              </div>
              <div class="col-md-2">
                <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="no. telepon"
                  name="nomor_telepon"
                  value="{{ $data->ud_nomor_telepon }}"
                  required>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary"
                  onclick="return confirm('Are you sure to edit this data?')">
                  Submit
                </button>
                <a href="/auth/user-management" type="reset" class="btn btn-secondary">Cancel</a>
              </div>
            </form><!-- End No Labels Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endSection