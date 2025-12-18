@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard RRI')

@section('content')

    <style>
        .stat-card {
            border: none;
            border-radius: 14px;
            padding: 20px;
            background: white;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            border-left: 6px solid #0A3FA3 !important;
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
        }

        .stat-title {
            font-size: 13px;
            font-weight: 600;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: .5px;
        }

        .table-modern thead {
            background: #0A3FA3;
            color: #fff;
        }

        .table-modern tbody tr:hover {
            background: #f5f9ff;
        }

        .btn-action {
            border-radius: 8px;
            padding: 6px 14px;
            font-weight: 600;
            font-size: 13px;
        }
    </style>

    <div class="row g-4">

        <!-- CARD: Total Konten -->
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Total Konten</div>
                        <h3 class="fw-bold">{{ $totalKonten }}</h3>
                    </div>
                    <i class="fa fa-film fa-2x text-primary"></i>
                </div>
            </div>
        </div>

        <!-- CARD: Total Person -->
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Total Person</div>
                        <h3 class="fw-bold">{{ $totalPerson }}</h3>
                    </div>
                    <i class="fa fa-users fa-2x text-info"></i>
                </div>
            </div>
        </div>

        <!-- CARD: Total Program -->
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Total Program</div>
                        <h3 class="fw-bold">{{ $totalProgram }}</h3>
                    </div>
                    <i class="fa fa-tv fa-2x text-warning"></i>
                </div>
            </div>
        </div>

        <!-- CARD: Konten Bulan Ini -->
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <div class="stat-title">Konten Bulan Ini</div>
                        <h3 class="fw-bold">{{ $kontenBulanIni }}</h3>
                    </div>
                    <i class="fa fa-calendar-check fa-2x text-success"></i>
                </div>
            </div>
        </div>

    </div>

    <hr class="my-4">

    <!-- TABEL KONTEN TERBARU -->
    <div class="card shadow-sm border-0 p-4" style="border-radius: 14px;">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0">Konten Terbaru</h4>

            <div class="d-flex gap-2">
                <a href="/export/konten" class="btn btn-success btn-sm btn-action">
                    <i class="fa fa-file-excel"></i> Export Excel
                </a>
                <a href="/contents" class="btn btn-primary btn-sm btn-action">
                    <i class="fa fa-eye"></i> Lihat Semua
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tableDashboard" class="table table-modern table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Program</th>
                        <th>Klasifikasi</th>
                        <th>Medsos</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($latestContents as $item)
                        <tr>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->program->nama_program ?? '-' }}</td>
                            <td>{{ $item->klasifikasi->nama_klasifikasi ?? '-' }}</td>
                            <td>{{ $item->medsos->nama_medsos ?? '-' }}</td>
                            <td>
                                <a href="{{ $item->link }}" target="_blank" class="text-primary fw-semibold">
                                    <i class="fa fa-link"></i> Buka
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tableDashboard').DataTable({
                pageLength: 5,
                lengthChange: false,
                ordering: true
            });
        });
    </script>
@endpush
