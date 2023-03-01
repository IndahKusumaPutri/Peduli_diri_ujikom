@extends('layouts.app') 
@section('content') 
<div class="pagetitle">
    <h1>Isi Data</h1>
</div>
 <form action="/perjalanan/store" method="post" class="row g-3">
     @csrf
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="date" class="form-control" id="floatingName" placeholder="tanggal" name="tanggal" value={{ $date }} readonly>
                    <label for="floatingName">Tanggal</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="time" class="form-control" id="floatingEmail" placeholder="jam" name="jam" value={{ $time }} readonly>
                    <label for="floatingEmail">Jam</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingPassword" placeholder="suhu_tubuh" name="suhu_tubuh">
                    <label for="floatingPassword">Suhu Tubuh</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    <textarea name="lokasi" class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Lokasi</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
@endsection