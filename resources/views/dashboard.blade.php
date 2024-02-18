  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Laporlah</title>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Google Fonts - Poppins -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

      <style>
      </style>
  </head>

  <body>

      <div class="navbar" id="navbar">
          <div class="container">
              <h2>Laporlah</h2>
              <div class="navbar-links">
                  <a href="#form">Lapor</a>
                  <a href="#gallery">Gallery</a>
                  <a href="#data">Data Laporan</a>
              </div>
              <a href="#" class="login-btn">login</a>
          </div>
      </div>

      <div class="content">
          <div class="large-card">
              <h3>Lorem Ipsum</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ullamcorper massa nec lacus tempus, non
                  sodales mauris accumsan.</p>
          </div>
          <div class="animated-content">
              <div class="animation-element"></div>
          </div>
      </div>

      <h2 class="section-title" id="form">Form Laporan</h2> <!-- Section Title -->

      <div class="form">
          <div class="card">
              <div class="card-header bg-dark text-white">Form Laporan</div>
              <div class="card-body">
                  @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif

                  <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-3">
                          <label for="nis" class="form-label">NIS</label>
                          <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis"
                              name="nis" value="{{ old('nis') }}" required>
                          @error('nis')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="nama" class="form-label">Nama</label>
                          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                              name="nama" value="{{ old('nama') }}" required>
                          @error('nama')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>


                      <div class="mb-3">
                          <label for="alamat" class="form-label">Alamat Kejadian</label>
                          <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                              id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                          @error('alamat')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <!-- Add more radio buttons as needed -->

                      <!-- Remaining fields omitted for brevity -->

                      <div class="mb-3">
                          <label for="kategori" class="form-label">Kategori</label>
                          <select class="form-select @error('kategori') is-invalid @enderror" id="kategori"
                              name="kategori" required>
                              <option value="" selected disabled>Pilih Kategori</option>
                              <option value="Fasilitas Umum"
                                  {{ old('kategori') == 'Fasilitas Umum' ? 'selected' : '' }}>Fasilitas Umum</option>
                              <option value="Kebersihan" {{ old('kategori') == 'Kebersihan' ? 'selected' : '' }}>
                                  Kebersihan</option>
                              <option value="Keamanan" {{ old('kategori') == 'Keamanan' ? 'selected' : '' }}>Keamanan
                              </option>
                              <option value="Hak Asasi" {{ old('kategori') == 'Hak Asasi' ? 'selected' : '' }}>Hak
                                  Asasi</option>
                              <option value="Kurikulum" {{ old('kategori') == 'Kurikulum' ? 'selected' : '' }}>
                                  Kurikulum</option>
                              <option value="Pelayanan Guru"
                                  {{ old('kategori') == 'Pelayanan Guru' ? 'selected' : '' }}>Pelayanan Guru</option>
                              <option value="Disiplin Siswa"
                                  {{ old('kategori') == 'Disiplin Siswa' ? 'selected' : '' }}>Disiplin Siswa</option>
                              <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>
                                  Kesehatan</option>
                              <option value="Kegiatan Ekstrakurikuler"
                                  {{ old('kategori') == 'Kegiatan Ekstrakurikuler' ? 'selected' : '' }}>Kegiatan
                                  Ekstrakurikuler</option>
                              <option value="Pungutan Liar" {{ old('kategori') == 'Pungutan Liar' ? 'selected' : '' }}>
                                  Pungutan Liar</option>
                              <option value="Bullying" {{ old('kategori') == 'Bullying' ? 'selected' : '' }}>Bullying
                              </option>
                              <option value="Pelanggaran Tata Tertib"
                                  {{ old('kategori') == 'Pelanggaran Tata Tertib' ? 'selected' : '' }}>Pelanggaran Tata
                                  Tertib</option>
                              <option value="Kualitas Makanan Kantin"
                                  {{ old('kategori') == 'Kualitas Makanan Kantin' ? 'selected' : '' }}>Kualitas Makanan
                                  Kantin</option>
                              <option value="Perlindungan Lingkungan"
                                  {{ old('kategori') == 'Perlindungan Lingkungan' ? 'selected' : '' }}>Perlindungan
                                  Lingkungan</option>
                              <option value="Penggunaan Narkoba"
                                  {{ old('kategori') == 'Penggunaan Narkoba' ? 'selected' : '' }}>Penggunaan Narkoba
                              </option>
                              <option value="Pelecehan Seksual"
                                  {{ old('kategori') == 'Pelecehan Seksual' ? 'selected' : '' }}>Pelecehan Seksual
                              </option>
                              <option value="Kedisiplinan Guru"
                                  {{ old('kategori') == 'Kedisiplinan Guru' ? 'selected' : '' }}>Kedisiplinan Guru
                              </option>
                              <option value="Sistem Evaluasi"
                                  {{ old('kategori') == 'Sistem Evaluasi' ? 'selected' : '' }}>Sistem Evaluasi</option>
                              <option value="Sarana Prasarana"
                                  {{ old('kategori') == 'Sarana Prasarana' ? 'selected' : '' }}>Sarana Prasarana
                              </option>
                              <option value="Kualitas Pembelajaran"
                                  {{ old('kategori') == 'Kualitas Pembelajaran' ? 'selected' : '' }}>Kualitas
                                  Pembelajaran</option>
                              <option value="Sistem Informasi Sekolah"
                                  {{ old('kategori') == 'Sistem Informasi Sekolah' ? 'selected' : '' }}>Sistem
                                  Informasi Sekolah</option>
                              <option value="Kesejahteraan Siswa"
                                  {{ old('kategori') == 'Kesejahteraan Siswa' ? 'selected' : '' }}>Kesejahteraan Siswa
                              </option>
                              <option value="Kualitas Bimbingan Konseling"
                                  {{ old('kategori') == 'Kualitas Bimbingan Konseling' ? 'selected' : '' }}>Kualitas
                                  Bimbingan Konseling</option>
                              <option value="Pelayanan Administrasi"
                                  {{ old('kategori') == 'Pelayanan Administrasi' ? 'selected' : '' }}>Pelayanan
                                  Administrasi</option>
                              <!-- Tambahkan opsi untuk kategori yang baru ditambahkan -->
                          </select>
                          @error('kategori')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>


                      <div class="mb-3">
                          <label for="isi_laporan" class="form-label">Isi Laporan</label>
                          <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="isi_laporan" name="isi_laporan"
                              rows="4" required>{{ old('isi_laporan') }}</textarea>
                          @error('isi_laporan')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="foto" class="form-label">Foto</label>
                          <input type="file" class="form-control @error('foto') is-invalid @enderror"
                              id="foto" name="foto" accept="image/*" required>
                          @error('foto')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3">
                          <label for="tanggal_laporan" class="form-label">Tanggal Laporan</label>
                          <input type="date" class="form-control @error('tanggal_laporan') is-invalid @enderror"
                              id="tanggal_laporan" name="tanggal_laporan" value="{{ old('tanggal_laporan') }}"
                              required>
                          @error('tanggal_laporan')
                              <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>

                      <div class="mb-3" style="display: none;">
                          <label for="status" class="form-label">Status</label>
                          <select class="form-select" id="status" name="status">
                              <option value="proses">Proses</option>
                              <option value="selesai">Selesai</option>
                              <option value="belum dikonfirmasi" selected>Belum Dikonfirmasi</option>
                          </select>
                      </div>


                      <button type="submit" class="btn btn-dark">Submit</button>
                  </form>
              </div>
          </div>
      </div>
      </div>


      <h2 class="section-title" id="gallery">Gallery</h2> <!-- Section Title -->
      <br>
      <br>
      <br>

      <div class="gallery-container">
          <div class="gallery-slides">
              <div class="slide"><img src="{{ asset('storage/images/1.jpg') }}" alt="Image 1"></div>
              <div class="slide"><img src="{{ asset('storage/images/2.jpg') }}" alt="Image 2"></div>
              <div class="slide"><img src="{{ asset('storage/images/3.jpg') }}" alt="Image 3"></div>
              <div class="slide"><img src="{{ asset('storage/images/4.jpg') }}" alt="Image 1"></div>
              <div class="slide"><img src="{{ asset('storage/images/5.jpg') }}" alt="Image 2"></div>
              <div class="slide"><img src="{{ asset('storage/images/6.jpg') }}" alt="Image 3"></div>
          </div>
          <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
          <button class="next" onclick="moveSlide(1)">&#10095;</button>
      </div>


      <h2 class="section-title" id="data">Data Laporan</h2> <!-- Section Title -->
            <div class="form">
                <div class="card">
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
</div>
    <div class="container mt-3">
        <div class="row">
            
                </div>
            </div>
        </div>
    </div>
</div>
    
    <div class="container mt-3" id="data">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Isi Laporan</th>
                    <th>Tanggal Laporan</th>
                    <th>Status</th>
                    <th>Umpan Balik</th>
                </tr>
            </thead>
                  <tbody>
                  @foreach ($laporans as $laporan)
                      @if ($laporan->klasifikasi != 'anonim')
                          <tr>
                              <td>{{ $laporan->id }}</td>
                              <td>{{ $laporan->nis }}</td>
                              <td>{{ $laporan->nama }}</td>
                              <td>{{ $laporan->kategori }}</td>
                              <td>{{ $laporan->isi_laporan }}</td>
                              <td>{{ $laporan->tanggal_laporan }}</td>
                              <td>
                                  <span
                                      class="status {{ strtolower(str_replace(' ', '-', $laporan->status)) }}">{{ $laporan->status }}</span>
                              </td>
                              @php
                              $feedback = App\Models\Feedback::where('laporan_id', $laporan->id)->first();
                          @endphp
                          @if ($laporan->status == 'selesai')
                              @if ($feedback)
                                  <td>Laporan sudah diberi ulasan</td>
                              @else
                                  <td>
                                      <button type="button" class="btn btn-primary give-feedback-btn"
                                          data-laporan-id="{{ $laporan->id }}">Beri Ulasan</button>
                                  </td>
                              @endif
                          @else
                              <td>
                                  <p>Laporan Belum Selesai</p>
                              </td>
                          @endif
                      </tr>
                  @endif
              @endforeach
              </tbody>
          </table>
      </div>


      <tbody id="laporan-body">
          <!-- Data laporan akan dimuat di sini menggunakan JavaScript -->
      </tbody>
      <br>
      <br>
      <br>

      <footer class="footer">
          <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center">
                      <p>&copy; 2024 Adrian. All rights reserved.</p>
                  </div>
              </div>
          </div>
      </footer>


      <style>
          .status {
              padding: 5px 10px;
              border-radius: 4px;
              font-weight: bold;
          }

          .status.belum-dikonfirmasi {
              background-color: #ff5555;
              /* Red */
              color: white;
          }

          .status.proses {
              background-color: #ffcc00;
              /* Yellow */
              color: black;
          }

          .status.selesai {
              background-color: #00cc66;
              /* Green */
              color: white;
          }
      </style>

      <!-- Feedback Modal -->
      <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="feedbackModalLabel">Give Feedback</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form id="feedbackForm" action="{{ route('feedback.handle') }}" method="POST">
                          @csrf
                          <input type="hidden" name="laporan_id" id="laporan_id">
                          <div class="form-group">
                              <label for="feedback_content">Feedback:</label>
                              <textarea class="form-control" id="feedback_content" name="feedback_content" rows="4"></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit Feedback</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>


      <!-- Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('js/animation.js') }}"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <script>
          $(document).ready(function() {
              $('.give-feedback-btn').click(function() {
                  var laporanId = $(this).data('laporan-id');
                  $('#laporan_id').val(laporanId);
                  $('#feedbackModal').modal('show');
              });
          });
      </script>

      <script>
               </script>

  </body>

  </html>
