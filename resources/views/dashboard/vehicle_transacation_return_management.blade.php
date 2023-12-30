@extends('layouts.dashboard')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengembalian Mobil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pengembalian Mobil</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pengembalian Mobil</h5>
              
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                
                <div class="datatable-top">
                  <div class="datatable-search">
                    <form action="" method="get">
                      <input class="datatable-input" placeholder="Search..." type="search" autocomplete="off"  title="Search within table" name="search" id="search" onchange="onChangeHandler()">
                    </form>
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
                          <button>Merk</button>
                        </th>
                        <th class="text-center">
                          <button>Model</button>
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
                            <td class="text-center">{{ $item['vd_merk'] }}</td>
                            <td class="text-center">{{ $item['vd_model'] }}</td>

                            @switch($item['vtrd_status'])
                                @case("Y")
                                  <td class="text-center">Finished</td>
                                @break

                                @case("N")
                                  <td class="text-center">Rejected</td>
                                @break

                                @default
                                  <td class="text-center">Waiting</td>
                            @endswitch

                            <td class="text-center">
                              @if ($item['vtrd_status'] != 'Y' && session('user_data')->ud_level == 'admin')
                                <a
                                  href="{{ route('approve-return', ['id' => $item['vrd_id']]) }}"
                                  onclick="return confirm('Are you sure to approve this transaction?')">
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
