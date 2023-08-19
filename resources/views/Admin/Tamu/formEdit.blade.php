@extends('app')
@section('content')
<a href="{{ url('admin/tamu') }}" class=" "> <span class="btn btn-secondary">Kembali</span></a>
<br/>
<br/>
        <div class="card">
            <div class="card-header">
                 Edit Buku Tamu
    </div>
    <div class="card-body">
    <form action="{{url('admin/update-data')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" value ="{{$data->nama}}" name="nama" id="nama" aria-describedby="nama">
            </div>
            <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="number" class="form-control" value ="{{$data->tlp}}" name="telepon" id="telepon" aria-describedby="telepon">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="alamat" class="form-control" value ="{{$data->alamat}}"name="alamat" id="alamat" aria-describedby="alamat">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value ="{{$data->email}}" name="email" id="email" aria-describedby="email">
            </div>
            <input type="hidden" value="{{$data->id}}" name="id">

            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection