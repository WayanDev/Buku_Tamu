@extends('layout.appadmin')

@section('content')

<h1 class="mt-4">Daftar Tamu</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
    <li class="breadcrumb-item active">Daftar Tamu</li>
</ol>
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between items-center">
        <div class="pt-2">
            <i class="fas fa-table me-1"></i>
            Data Tamu
        </div>
    </div>

    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat/Instansi</th>
                    <th>Kesan</th>
                    <th>Pesan</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no=1;
                @endphp
                @foreach ($tamu as $t)
                
                <tr>
                    <th>{{ $no }}</th>
                    <th>{{ $t->nama }}</th>
                    <th>{{ $t->jenis_kelamin }}</th>
                    <th>{{ $t->alamat }}</th>
                    <th>{{ $t->kesan }}</th>
                    <th>{{ $t->pesan }}</th>
                    <th>
                        @if ($t->image)
                            <img src="{{ asset('images/'.$t->image) }}" alt="Foto Tamu" width="100">
                        @else
                            <img src="{{ asset('photos/noimage.png') }}" alt="No Image">
                        @endif
                    </th>
                    <td>
                        <form action="{{ route('tamu.destroy', $t->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @php
                    $no++
                @endphp
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
@endsection