<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admindashboard.css') }}">
</head>
<body>
    <?php
    // Check if the user is not authenticated
    if (!Auth::check()) {
        // Redirect the user to the login page
        return redirect('/login');
    }
    ?>

    <div class="container mt-5">
        <h1>Dashboard</h1>
        <div class="col-md-4">
            <select id="kategoriFilter" class="form-control">
                <option value="all">Kategori</option>
                <option value="Fasilitas Umum">Fasilitas Umum</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Hak Asasi">Hak Asasi</option>
                <option value="Kurikulum">Kurikulum</option>
                <option value="Pelayanan Guru">Pelayanan Guru</option>
                <option value="Disiplin Siswa">Disiplin Siswa</option>
                <option value="Kesehatan">Kesehatan</option>
                <option value="Kegiatan Ekstrakurikuler">Kegiatan Ekstrakurikuler</option>
                <option value="Pungutan Liar">Pungutan Liar</option>
                <option value="Bullying">Bullying</option>
                <option value="Pelanggaran Tata Tertib">Pelanggaran Tata Tertib</option>
                <option value="Kualitas Makanan Kantin">Kualitas Makanan Kantin</option>
                <option value="Perlindungan Lingkungan">Perlindungan Lingkungan</option>
                <option value="Penggunaan Narkoba">Penggunaan Narkoba</option>
                <option value="Pelecehan Seksual">Pelecehan Seksual</option>
                <option value="Kedisiplinan Guru">Kedisiplinan Guru</option>
                <option value="Sistem Evaluasi">Sistem Evaluasi</option>
                <option value="Sarana Prasarana">Sarana Prasarana</option>
                <option value="Kualitas Pembelajaran">Kualitas Pembelajaran</option>
                <option value="Sistem Informasi Sekolah">Sistem Informasi Sekolah</option>
                <option value="Kesejahteraan Siswa">Kesejahteraan Siswa</option>
                <option value="Kualitas Bimbingan Konseling">Kualitas Bimbingan Konseling</option>
                <option value="Pelayanan Administrasi">Pelayanan Administrasi</option>
            </select>
        </div>
        <div class="col-md-4" class="col-md-6 offset-md-6 text-right">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" class="form-control">
        </div>
        <div class="col-md-4">
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" class="form-control">
        </div>
        <br>
        <div class="col-md-4">
            <div class="input-group">
                <input type="text" id="searchId" class="form-control" placeholder="Search ID...">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="searchBtn">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">

        </div>
    </div>
    </div>
    </div>
    <div class="table-responsive" id="data">
        @if ($laporans->isEmpty())
            <p>No Laporans available</p>
        @else
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tanggal Laporan</th>
                        <th>Status</th>
                        <th>Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporans as $laporan)
                        <tr>
                            <td>{{ $laporan->id }}</td>
                            <td>{{ $laporan->nis }}</td>
                            <td>{{ $laporan->nama }}</td>
                            <td>{{ $laporan->kategori }}</td>
                            <td>{{ $laporan->tanggal_laporan }}</td>
                            <td><span
                                    class="status {{ strtolower(str_replace(' ', '-', $laporan->status)) }}">{{ $laporan->status }}</span>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary show-report" data-toggle="modal"
                                    data-target="#reportModal" data-report-id="{{ $laporan->id }}">Show</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    </div>
    </div>
    <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (isset($laporan))
                        <p><strong>ID:</strong> {{ $laporan->id }}</p>
                        <p><strong>NIS:</strong> {{ $laporan->nis }}</p>
                        <p><strong>Nama:</strong> {{ $laporan->nama }}</p>
                        <p><strong>Kategori:</strong> {{ $laporan->kategori }}</p>
                        <p><strong>Tanggal Laporan:</strong> {{ $laporan->tanggal_laporan }}</p>
                        <p><strong>Isi:</strong> {{ $laporan->isi_laporan }}</p>
                        <p><strong>Status:</strong> {{ $laporan->status }}</p>
                        @php
                            $feedback = App\Models\Feedback::where('laporan_id', $laporan->id)->first();
                        @endphp

                        @if ($feedback)
                            <p><strong>Ulasan dari User:</strong> {{ $feedback->feedback_content }}</p>
                        @else
                            <p><strong>Ulasan dari User:</strong> No feedback available</p>
                        @endif
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $laporan->foto) }}" alt="Foto Laporan" class="img-fluid">
                        </div>
                    @else
                        <p>No laporan details available</p>
                    @endif
                </div>
                <div class="modal-footer">
                    @if (isset($laporan))
                        <form action="{{ route('admin.updateStatus', $laporan->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status">Edit Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="belum dikonfirmasi">Belum Dikonfirmasi</option>
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                        <form action="{{ route('admin.deleteLaporan', $laporan->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Laporan</button>
                        </form>
                    @else
                        <p>No laporan details available</p>
                    @endif
                </div>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
