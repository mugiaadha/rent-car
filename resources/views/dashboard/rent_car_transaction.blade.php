@extends('layouts.dashboard')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Peminjaman Mobil</h1>
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
            <h5 class="card-title">Peminjaman Mobil</h5>
            
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
              
              <div class="datatable-top">
              
              <div class="datatable-search">
                <input class="datatable-input" placeholder="Search..." type="text" autocomplete="off" title="Search within table" name="search" id="search" value="{{ \Request::input('search') ? \Request::input('search') : '' }}">
              </div>
              <div class="datatable-container">
                <table class="table datatable datatable-table">
                  <thead>
                    <tr>
                      <th data-sortable="true" style="width: 7.41097208854668%;">
                        <button class="datatable-sorter">#</button>
                      </th>
                      <th data-sortable="true" style="width: 26.371511068334936%;">
                        <button class="datatable-sorter">Name</button>
                      </th>
                      <th data-sortable="true" style="width: 35.514918190567855%;">
                        <button class="datatable-sorter">Position</button>
                      </th>
                      <th data-sortable="true" style="width: 10.779595765158806%;">
                        <button class="datatable-sorter">Age</button>
                      </th>
                      <th data-sortable="true" style="width: 19.92300288739172%;">
                        <button class="datatable-sorter">Start Date</button>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr data-index="0">
                      <td>1</td>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr data-index="1">
                      <td>2</td>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr data-index="2">
                      <td>3</td>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr data-index="3">
                      <td>4</td>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>34</td>
                      <td>2012-06-11</td></tr><tr data-index="4">
                      <td>5</td>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="datatable-bottom">
              
              <nav class="datatable-pagination">
                <ul class="datatable-pagination-list"></ul>
              </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endSection