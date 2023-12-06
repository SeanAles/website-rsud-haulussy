@extends('admin.layout.main')

@section("title", "Dashboard")

@section('content')
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3> {{ $countPost }} </h3>
          <p>Postingan</p>
        </div>
        <div class="icon">
          <i class="fas fa-newspaper"></i>
        </div>
        <a href="/post" class="small-box-footer">Lebih Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $countBed }}</h3>
          <p>Ketersediaan Bed</p>
        </div>
        <div class="icon">
          <i class="fas fa-bed"></i>
        </div>
        <a href="/bed" class="small-box-footer">Lebih Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>0</h3>
          <p>Galeri Kegiatan</p>
        </div>
        <div class="icon">
          <i class="fas fa-images"></i>
        </div>
        <a href="#" class="small-box-footer">Lebih Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>0</h3>
          <p>Akun User</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/post" class="small-box-footer">Lebih Detail <i class="fas fa-arrow-circle-right"></i></a> 
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
@endsection


