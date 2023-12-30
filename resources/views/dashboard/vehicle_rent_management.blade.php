@extends('layouts.dashboard')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Peminjaman Mobil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Peminjaman Mobil</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Peminjaman Mobil</h5>
              
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                
                <div class="datatable-top">
                  <div class="datatable-search">
                    <form action="" method="get">
                      <input class="datatable-input" placeholder="Search..." type="text" autocomplete="off" title="Search within table" name="search" id="search" value="{{ \Request::input('search') ? \Request::input('search') : '' }}">
                    </form>
                  </div>

                  <div class="datatable-search">
                    <a href="{{ route('add-rent-transaction') }}" class="btn btn-primary"><i class="ri ri-add-circle-fill"></i> Create Rent</a>
                  </div>
                </div>
                <div class="datatable-container">
                  <table class="table datatable datatable-table">
                    <thead>
                      <tr>
                        <th class="text-center">
                          <button>#</button>
                        </th>
                        <th class="text-center">
                          <button>Transaction ID</button>
                        </th>
                        <th class="text-center">
                          <button>Penyewa</button>
                        </th>
                        <th class="text-center">
                          <button>Merk - Model <br> Plat Nomor</button>
                        </th>
                        <th class="text-center">
                          <button>Tanggal Pinjam</button>
                        </th>
                        <th class="text-center">
                          <button>Tanggal Kembali</button>
                        </th>
                        <th class="text-center">
                          <button>Status</button>
                        </th>
                        <th class="text-center">
                          <button>Action</button>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($data->count())
                        @foreach ($data as $key => $item)
                          <tr data-index="{{ $key }}">
                            <td class="text-center">{{ (($data->currentPage()-1)*$data->perPage()) + ($key+1) }}</td>
                            <td class="text-center">{{ $item['vrd_transaction_number'] }}</td>
                            <td class="text-center">{{ $item['ud_nama'] }}</td>
                            <td class="text-center">{{ $item['vd_merk']." - ".$item['vd_model'] }}<br>{{ $item['vd_plat_nomor'] }}</td>
                            <td class="text-center">{{ $item['rent_date'] }}</td>
                            <td class="text-center">{{ $item['estimated_until_date'] }}</td>
                            @switch($item['vrd_status'])
                                @case("Y")
                                  <td class="text-center">Approved</td>
                                @break

                                @case("N")
                                  <td class="text-center">Rejected</td>
                                @break

                                @default
                                  <td class="text-center">Waiting</td>
                            @endswitch

                            <td class="text-center">
                              @if ($item['vrd_status'] == 'D' && session('user_data')->ud_level == 'admin')
                                <a
                                  href="{{ route('approve-rent', ['id' => $item['vrd_id']]) }}"
                                  onclick="return confirm('Are you sure to approve this rent?')">
                                  <i class="bi bi-check-circle"></i>
                                </a>
                              @endif
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <tr>
                          <td colspan="10" class="text-center"><h4>Empty Data</h4></td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
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
