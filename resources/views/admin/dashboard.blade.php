@extends('admin.layouts.app')
@push('title')
Dashboard
@endpush
@section('content')

<main class="app-main">
  <!--begin::App Content Header-->
  <div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6">
          <h3 class="mb-0">Dashboard</h3>
        </div>

      </div>
      <!--end::Row-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content Header-->
  <!--begin::App Content-->
  <div class="app-content">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row g-3">

        <!-- Images -->
        <div class="col-lg col-md-4 col-6">
          <div class="small-box" style="background-color:#00968A;color:white;">
            <div class="inner">
              <h3>7</h3>
              <p>Total Images</p>
            </div>
            <i class="small-box-icon bi bi-image"></i>
            <a href="#" class="small-box-footer">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        <!-- Videos -->
        <div class="col-lg col-md-4 col-6">
          <div class="small-box" style="background-color:#00968A;color:white;">
            <div class="inner">
              <h3>2</h3>
              <p>Total Videos</p>
            </div>
            <i class="small-box-icon bi bi-camera-video"></i>
            <a href="#" class="small-box-footer">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        <!-- News & Events -->
        <div class="col-lg col-md-4 col-6">
          <div class="small-box" style="background-color:#00968A;color:white;">
            <div class="inner">
              <h3>3</h3>
              <p>News & Events</p>
            </div>
            <i class="small-box-icon bi bi-file-earmark-text-fill"></i>
            <a href="#" class="small-box-footer">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        <!-- Contact Messages -->
        <div class="col-lg col-md-4 col-6">
          <div class="small-box" style="background-color:#00968A;color:white;">
            <div class="inner">
              <h3>7</h3>
              <p>Contact Messages</p>
            </div>
            <i class="small-box-icon bi bi-envelope"></i>
            <a href="#" class="small-box-footer">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

        <!-- Admissions -->
        <div class="col-lg col-md-4 col-6">
          <div class="small-box" style="background-color:#00968A;color:white;">
            <div class="inner">
              <h3>4</h3>
              <p>Admission Applications</p>
            </div>
            <i class="small-box-icon bi bi-person-lines-fill"></i>
            <a href="#" class="small-box-footer">
              More info <i class="bi bi-link-45deg"></i>
            </a>
          </div>
        </div>

      </div>


      <div class="row mt-4">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Images</h3>
            </div>
            <div class="card-body d-flex gap-3 overflow-auto">
              
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Videos</h3>
            </div>
            <div class="card-body d-flex gap-3 overflow-auto">
            
            </div>
          </div>
        </div>
      </div>


      <div class="row mt-4">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest News & Events</h3>
            </div>

            <div class="card-body table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                  </tr>
                </thead>
                <tbody>
                 
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Latest Contact Messages</h3>
            </div>

            <div class="card-body table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>


    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</main>

@endsection