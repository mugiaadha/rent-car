@extends('layouts.outer_dashboard')

@section('main')
    <main>
        <div class="container">
            <section class="section">
                <div class="row">
                    <div class="col-sm-4"></div>

                    <div class="col-sm-5" style="margin-top:100px;">
                        <div class="card m-top">
                            <div class="card-body">
                                <h5 class="card-title text-center">Login Form</h5>
                                <form action="" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputEmail3" class="col-sm-12 col-form-label">Username / Email</label>
                                        <div class="col-sm-12">
                                        <input type="text" name="username" class="form-control" id="inputEmail">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword3" class="col-sm-12 col-form-label">Password</label>
                                        <div class="col-sm-12">
                                        <input type="password" name="password" class="form-control" id="inputPassword">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form><!-- End Horizontal Form -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </section>
        </div>
    </main>
@endSection