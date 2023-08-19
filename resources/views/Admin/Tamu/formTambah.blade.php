@extends('app')
@section('content')
<a href="{{ url('admin/tamu') }}" class=" "> <span class="btn btn-secondary">Kembali</span></a>
<br/>
<br/>
        <div class="card">
            <div class="card-header">
                 Tambah Buku Tamu
    </div>
    <div class="card-body">
    <form action="{{url('admin/simpan-data')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="nama">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" class="form-control" name="telepon" id="telepon" aria-describedby="telepon">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="alamat" class="form-control" name="alamat" id="alamat" aria-describedby="alamat">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="email">
            </div>

            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection