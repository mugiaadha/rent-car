@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Return Car Transaction</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Return Car Transaction</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Informasi Pribadi</h5>
            <form class="row g-3">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Nama</label>
                <input type="text" class="form-control" id="inputNanme4" value="{{ $data->ud_nama  }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputEmail4" class="form-label">Alamat</label>
                <textarea
                  name="alamat"
                  cols="30"
                  rows="10"
                  class="form-control"
                  placeholder="address"
                  style="height:100px;">{{ $data->ud_alamat }}</textarea>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="inputPassword4" value="{{ $data->ud_nomor_telepon }}" readonly>
              </div>
            </form>

            <h5 class="card-title">Informasi Kendaraan</h5>
            <form class="row g-3">
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" id="inputNanme4" value="{{ $data->vd_plat_nomor  }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Merk</label>
                <input type="text" class="form-control" id="inputPassword4" value="{{ $data->vd_merk }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Model</label>
                <input type="text" class="form-control" id="inputPassword4" value="{{ $data->vd_model }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Tarif Per Hari</label>
                <input type="text" class="form-control" id="inputPassword4" value="{{ $data->vd_tarif }}" readonly>
              </div>
            </form>

            <h5 class="card-title">Pembayaran</h5>
            <form class="row g-3" action="{{ route('do-approve-return', ['id' => $data->vrd_id]) }}">
              @csrf
              <input type="hidden" name="rent_id" class="form-control" id="inputNanme4" value="{{ $data->vrd_id }}" readonly>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Transaction Number</label>
                <input type="text" class="form-control" id="inputNanme4" value="{{ $data->vrd_transaction_number }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputNanme4" class="form-label">Tanggal Sewa</label>
                <input type="text" class="form-control" id="inputNanme4" value="{{ $data->vrd_updated_date  }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Tanggal Kembali Estimasi</label>
                <input type="text" class="form-control" id="inputPassword4" value="{{ $data->vrd_estimated_until_date }}" readonly>
              </div>
              <div class="col-12">
                <label for="inputPassword4" class="form-label">Total Biaya Sewa</label>
                <input type="text" class="form-control" id="inputPassword4" name="total_sewa" value="{{ $total }}" readonly>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary">
                  Submit
                </button>
                <a href="/auth/user-management" type="reset" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>
@endSection