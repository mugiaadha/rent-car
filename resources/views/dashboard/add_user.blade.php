@extends('layouts.outer-dashboard')

@section('main')
<main class="main" style="padding:50px 400px 0px 400px;">
  <div class="pagetitle" align="center">
    <h1>Mohon Isi Data Diri</h1>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Registrasi</h5>

            <!-- No Labels Form -->
            <form class="row g-3" action="/create-user" method="POST">
              @csrf
              <div class="col-md-12">
                <label for="inputEmail4" class="form-label">Nama Lengkap</label>  
                <input type="text" class="form-control" placeholder="nama lengkap" name="nama" required>
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="username / email" name="username" required>
              </div>
              <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password" required>
              </div>
              <div class="col-12">
                <textarea
                  name="alamat"
                  cols="30"
                  rows="10"
                  class="form-control"
                  placeholder="address"
                  style="height:100px;"></textarea>
              </div>
              <div class="col-md-4">
                <label for="inputEmail4" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="no. telepon" name="nomor_telepon" required>
              </div>
              <div class="col-md-8">
                <label for="inputEmail4" class="form-label">Nomor SIM</label>
                <input type="text" class="form-control" placeholder="no. sim" name="nomor_sim" required>
              </div>
              <div class="text-end">
                <button
                  type="submit"
                  class="btn btn-primary">
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