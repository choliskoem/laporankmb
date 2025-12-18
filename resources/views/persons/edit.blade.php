@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Person</h3>

        <form action="{{ route('persons.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tipe</label>
                <select name="type" class="form-control" required>
                    <option value="editor_konten">Editor Konten</option>
                    <option value="editor_cover">Editor Cover</option>
                    <option value="narator">Narator</option>
                    <option value="presenter">Presenter</option>
                    <option value="penulis_naskah">Penulis Naskah</option>
                    <option value="narasumber">Narasumber</option>
                    <option value="kameramen">Kameramen</option>
                    <option value="switcher">Switcher</option>
                </select>
            </div>

            <button class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
