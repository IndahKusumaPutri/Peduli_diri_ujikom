@extends('layouts.app') 
@section('content')
<div class="pagetitle">
      <h1>Data Perjalanan</h1>
</div>
 <div class="col-lg-16">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table Perjalanan</h5>
              <!-- Table with stripped rows -->
              @if(Auth::User()->role != 'user')
              <div class="my-2">
                  <div class="row mb-3">
                    <div class="col-md-12 col-lg-12">
                      <form action="/perjalanan" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <button class="btn btn-primary" type="submit">GET</button>
                        </div>
                      </form>  
                    </div>
                  </div>
                </div>
                <a href="/hapusall" class="btn btn-danger btn-sm">Hapus Semua</a>
               <table class="table table-bordered">
                 
                <thead>
                  <tr>
                    <th scope="col">id_user</th>
                    <th scope="col">Nama User</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                  </tr>
                </thead>
                @foreach($jalan as $j)
                <tbody>
                    <td>{{$j->user->id}}</td>
                    <td>{{$j->user->name}}</td>
                    <td>{{$j->tanggal}}</td>
                    <td>{{$j->jam}}</td>
                    <td>{{$j->lokasi}}</td>
                    <td>{{$j->suhu_tubuh}}</td>
                    <!-- <td align="center"><a href="/perjalanan/show/{{$j->user->id}}" class="btn btn-success">lihat Data</a></td>
                 --></tbody>
                 @endforeach
              </table>
              @else
                <div class="my-2">
                  <div class="row mb-3">
                    <div class="col-md-12 col-lg-12">
                      <form action="/perjalanan" method="GET">
                        <div class="input-group mb-3">
                            <input type="date" class="form-control" name="start_date">
                            <button class="btn btn-primary" type="submit">GET</button>
                        </div>
                      </form>  
                    </div>
                  </div>
                </div>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <!-- <th scope="col">Nama</th> -->
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Suhu Tubuh</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                @foreach($jalan as $j)
                <tbody>
                    <td>{{$loop->iteration}}</td>
                    <!-- <td>{{$j->user->name}}</td> -->
                    <td>{{$j->tanggal}}</td>
                    <td>{{$j->jam}}</td>
                    <td>{{$j->lokasi}}</td>
                    <td>{{$j->suhu_tubuh}}</td>
                    <td>
                        <a href="/perjalanan/delete/{{$j->id}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tbody>
                 @endforeach
              </table>
                <br>
                <center><a href="/perjalanan/tambah" class="btn btn-success">Masukan Data</a></center>
            <!-- End Table with stripped rows -->
            @endif
    </div> 
</div>
@endsection