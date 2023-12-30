@extends('layouts.dashboard')

@section('main')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Car Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Car Management</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Car Management</h5>
              
              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                
                <div class="datatable-top">
                  <div class="datatable-search">
                    <form action="" method="get">
                      <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" name="search" id="search" onchange="onChangeHandler()">
                    </form>
                  </div>

                  <div class="datatable-search">
                    <a href="{{ route('add-vehicle') }}" class="btn btn-primary"><i class="ri ri-add-circle-fill"></i> Add Vehicle</a>
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
                          <button>Plat Nomor</button>
                        </th>
                        <th class="text-center">
                          <button>Merk</button>
                        </th>
                        <th class="text-center">
                          <button>Model</button>
                        </th>
                        <th class="text-center">
                          <button>Tahun</button>
                        </th>
                        <th class="text-center">
                          <button>Tarif / hari</button>
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
                            <td class="text-center">{{ $item['vd_plat_nomor'] }}</td>
                            <td class="text-center">{{ $item['vd_merk'] }}</td>
                            <td class="text-center">{{ $item['vd_model'] }}</td>
                            <td class="text-center">{{ $item['vd_tahun'] }}</td>
                            <td class="text-center">{{ $item['vd_tarif'] }}</td>
                            @switch($item['vd_status'])
                                @case("Y")
                                  <td class="text-center">Available</td>
                                @break

                                @case("N")
                                  <td class="text-center">Not Available</td>
                                @break

                                @default
                                  <td class="text-center">Rented</td>
                            @endswitch
                            <td class="text-center">
                              <a
                                href="{{ route('edit-vehicle', ['id' => $item['vd_id']]) }}">
                                <i class="ri ri-edit-box-line"></i>
                              </a>
                              <a
                                href="{{ route('delete-vehicle', ['id' => $item['vd_id']]) }}"
                                onclick="return confirm('Are you sure to remove this data?')">
                                <i class="ri ri-delete-bin-2-fill"></i>
                              </a>
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