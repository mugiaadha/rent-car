@extends('layouts.dashboard')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Cari Mobil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Cari Mobil</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cari Mobil</h5>
              
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                
                <div class="datatable-top mb-3">
                  <div class="datatable-search">
                    <form action="" method="get">
                      <input class="datatable-input" placeholder="Search..." type="search" autocomplete="off"  title="Search within table" name="search" id="search" value="{{ \Request::input('search') ? 'asd' : '' }}" onchange="onChangeHandler()">
                    </form>
                  </div>
                </div>

                <div class="datatable-container">
                  @if ($data->count())
                  <div class="row">
                    @foreach ($data as $key => $item)
                      <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18cb973dc78%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18cb973dc78%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1937484741211%22%20y%3D%2296.24000034332275%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">
                          <div class="card-body">
                            <h5 class="card-title mb-0">{{ $item->vd_merk.' - '.$item->vd_model }}</h5>
                            <p class="card-text">Rp {{ number_format($item->vd_tarif , 0, ',', '.') }} / hari</p>
                            <p class="card-text">Nomor Polisi : {{ $item->vd_plat_nomor }}</p>
                            <p class="card-text">Tahun : {{ $item->vd_tahun }}</p>
                            <a href="{{ route('add-rent-transaction', ['vehicleId' => $item['vd_id']]) }}" class="btn btn-primary">Ajukan Sewa</a>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  @else
                    <div class="col-sm-12">
                      <h3 class="text-center">Empty Data</h3>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{ $data->links() }}
    </section>
  </main>
@endSection
