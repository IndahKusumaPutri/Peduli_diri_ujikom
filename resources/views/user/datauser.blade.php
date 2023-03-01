@extends('layouts.app')
@section('content')

<div class="pagetitle">
      <h1>Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Data User</li>
        </ol>
      </nav>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data User</h5>
            <div class="my-2">
              <div class="row mb-3">
                <div class="col-md-6 col-lg-6">
                  <form action="/user/cari" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="cari">
                        <button class="btn btn-primary" type="submit">GET</button>
                    </div>
                  </form>  
                </div>
              </div>
            </div>
            <a href="/datauser" target="_blank" class="btn btn-success btn-sm">Print</a>
            <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Telpon</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Foto</th>
                  </tr>
                </thead>
                @foreach($data_user as $v)
                <tbody>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$v->nik}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->username}}</td>
                        <td>{{$v->telp}}</td>
                        <td>{{$v->email}}</td>
                        <td>{{$v->alamat}}</td>
                        <td>
                            <img src="{{ asset('images/'. $v->foto) }}" alt="profile" height="50px" width="50px">
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</div>
    </div>
</section>

<!-- End Page Title -->
@endsection