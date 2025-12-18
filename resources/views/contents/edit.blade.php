@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tambah Konten</h3>

        <form action="{{ route('contents.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">

                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Program</label>
                        <select name="program_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($programs as $p)
                                <option value="{{ $p->id }}">{{ $p->nama_program }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Klasifikasi</label>
                        <select name="klasifikasi_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($klasifikasi as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_klasifikasi }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Medsos</label>
                        <select name="medsos_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($medsos as $m)
                                <option value="{{ $m->id }}">{{ $m->nama_medsos }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Format</label>
                        <select name="format_id" class="form-control">
                            <option value="">- Pilih -</option>
                            @foreach ($formats as $f)
                                <option value="{{ $f->id }}">{{ $f->nama_format }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Link</label>
                        <input type="text" name="link" class="form-control">
                    </div>

                </div>

                <div class="col-md-6">
                    <h5>Daftar Role</h5>

                    <div id="role-wrapper">
                        <div class="role-group mb-3">
                            <select name="roles[0][person_id]" class="form-control mb-1">
                                @foreach ($persons as $p)
                                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                            </select>

                            <select name="roles[0][role]" class="form-control">
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
                    </div>

                    <button type="button" class="btn btn-secondary" id="btnAddRole">+ Tambah Role</button>
                </div>
            </div>

            <button class="btn btn-primary mt-3">Simpan</button>

        </form>
    </div>

    <script>
        let roleIndex = 1;
        document.getElementById('btnAddRole').addEventListener('click', function() {

            let html = `
        <div class="role-group mb-3">
            <select name="roles[${roleIndex}][person_id]" class="form-control mb-1">
                @foreach ($persons as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>

            <select name="roles[${roleIndex}][role]" class="form-control">
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
    `;

            document.getElementById('role-wrapper').insertAdjacentHTML('beforeend', html);
            roleIndex++;
        });
    </script>
@endsection
