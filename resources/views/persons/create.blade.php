@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Tambah Person</h5>
            </div>

            <div class="card-body">

                <form action="{{ route('persons.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="name" class="form-control shadow-sm"
                            placeholder="Masukkan nama person" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipe Person</label>
                        <select name="type" class="form-select shadow-sm" required>
                            <option value="">-- Pilih Tipe --</option>
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

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('persons.index') }}" class="btn btn-secondary me-2">
                            <i class="fa fa-arrow-left"></i> Batal
                        </a>

                        <button class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
