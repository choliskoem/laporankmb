@extends('layouts.app')

@section('content')
    <style>
        .page-title {
            font-size: 24px;
            font-weight: 700;
        }

        .card-modern {
            background: #fff;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e5e7eb;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
        }

        .role-group {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            background: #ffffff;
            padding: 18px;
            position: relative;
            transition: 0.3s ease;
        }

        .role-group:hover {
            background: #f8fafc;
        }

        .remove-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            padding: 0;
        }

        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
        }
    </style>

    <div class="container mt-4">

        <h3 class="page-title mb-4">Tambah Konten</h3>

        <div class="card-modern">

            <form action="{{ route('contents.store') }}" method="POST">
                @csrf

                <div class="row">

                    <!-- LEFT SIDE -->
                    <div class="col-md-6">

                        <h6 class="section-title">Informasi Konten</h6>

                        <div class="mb-3">
                            <label class="fw-semibold">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Judul</label>
                            <input type="text" name="judul" class="form-control" placeholder="Judul konten..."
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Program</label>
                            <select name="program_id" class="form-select">
                                <option value="">- Pilih Program -</option>
                                @foreach ($programs as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama_program }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Klasifikasi</label>
                            <select name="klasifikasi_id" class="form-select">
                                <option value="">- Pilih Klasifikasi -</option>
                                @foreach ($klasifikasi as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_klasifikasi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Medsos</label>
                            <select name="medsos_id" class="form-select">
                                <option value="">- Pilih Media Sosial -</option>
                                @foreach ($medsos as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama_medsos }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Format</label>
                            <select name="format_id" class="form-select">
                                <option value="">- Pilih Format -</option>
                                @foreach ($formats as $f)
                                    <option value="{{ $f->id }}">{{ $f->nama_format }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="fw-semibold">Link</label>
                            <input type="text" name="link" class="form-control"
                                placeholder="Masukkan link postingan...">
                        </div>

                    </div>

                    <!-- RIGHT SIDE -->
                    <div class="col-md-6">

                        <h6 class="section-title">Daftar Role</h6>

                        <div id="role-wrapper">

                            <!-- ROLE PERTAMA -->
                            <div class="role-group mb-3 shadow-sm">

                                <button type="button" class="btn btn-danger btn-sm remove-btn btn-remove-role"
                                    style="display:none;">
                                    <i class="fa fa-trash"></i>
                                </button>

                                <div class="mb-2">
                                    <label class="fw-semibold small">Person</label>
                                    <select name="roles[0][person_id]" class="form-select">
                                        @foreach ($persons as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label class="fw-semibold small">Role</label>
                                    <select name="roles[0][role]" class="form-select">
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

                        </div>

                        <button type="button" class="btn btn-outline-primary mt-2" id="btnAddRole">
                            <i class="fa fa-plus"></i> Tambah Role
                        </button>

                    </div>
                </div>

                <button class="btn btn-primary mt-4 px-4">Simpan</button>

            </form>

        </div>
    </div>

    <script>
        let roleIndex = 1;

        document.getElementById('btnAddRole').addEventListener('click', function() {

            let html = `
                <div class="role-group mb-3 shadow-sm">

                    <button type="button" class="btn btn-danger btn-sm remove-btn btn-remove-role">
                        <i class="fa fa-trash"></i>
                    </button>

                    <div class="mb-2">
                        <label class="fw-semibold small">Person</label>
                        <select name="roles[${roleIndex}][person_id]" class="form-select">
                            @foreach ($persons as $p)
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="fw-semibold small">Role</label>
                        <select name="roles[${roleIndex}][role]" class="form-select">
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
            `;

            document.getElementById('role-wrapper').insertAdjacentHTML('beforeend', html);

            roleIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-remove-role')) {
                const card = e.target.closest('.role-group');

                card.style.opacity = "0";
                card.style.transform = "scale(0.95)";

                setTimeout(() => {
                    card.remove();
                }, 250);
            }
        });
    </script>
@endsection
