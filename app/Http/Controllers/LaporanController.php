<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kategori' => 'required|in:Fasilitas Umum,Kebersihan,Keamanan,Hak Asasi,Kurikulum,Pelayanan Guru,Disiplin Siswa,Kesehatan,Kegiatan Ekstrakurikuler,Pungutan Liar,Bullying,Pelanggaran Tata Tertib,Kualitas Makanan Kantin,Perlindungan Lingkungan,Penggunaan Narkoba,Pelecehan Seksual,Kedisiplinan Guru,Sistem Evaluasi,Sarana Prasarana,Kualitas Pembelajaran,Sistem Informasi Sekolah,Kesejahteraan Siswa,Kualitas Bimbingan Konseling,Pelayanan Administrasi',
            'isi_laporan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048000', // Ubah sesuai kebutuhan
            'alamat' => 'required',
            'status' => 'required',
            'tanggal_laporan' => 'required|date',
        ]);

        if (!$request->hasFile('foto')) {
            return redirect()->back()->withErrors(['foto' => 'The foto field is required.']);
        }

        // Menyimpan file foto ke direktori public/images
        $fotoPath = $request->file('foto')->store('images', 'public');

        $laporan = Laporan::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'isi_laporan' => $request->isi_laporan,
            'foto' => $fotoPath,
            'alamat' => $request->alamat,
            'status' => $request->status,
            'tanggal_laporan' => $request->tanggal_laporan,
        ]);

        // Display a simple JavaScript alert
        echo "<script>alert('Terima Kasih. Laporan Anda telah berhasil disimpan.')</script>";

        // You can also use the built-in Laravel helper function for redirect
        return redirect()->back();
    }


  
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
    public function showAdminDashboard()
    {
        // Fetch reports from the database
        $laporans = Laporan::all();

        if (auth()->check()) {
        // Pass the fetched reports to the dashboard view
        return view('admin.dashboard', ['laporans' => $laporans]);
    } else {
        // User is not authenticated, redirect to the login page
        return redirect('/login');
    }
    }

 
    public function showDashboard()
    {
        // Fetch laporans excluding those with the classification "anonim"
        $laporans = Laporan::all();

        // Pass the filtered laporans data to the dashboard view
        return view('dashboard', compact('laporans'));
    }

    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.show', compact('laporan'));
    }

    public function getByCategory(Request $request)
    {
        $category = $request->input('category');

        // Retrieve laporan data based on the selected category
        $laporans = Laporan::where('kategori', $category)
                            ->where('klasifikasi', '!=', 'anonim')
                            ->get();

        // Return the filtered data as HTML response
        return view('laporan.table', ['laporans' => $laporans])->render();
    }

    public function handleFeedback(Request $request)
    {
        // Validate the feedback form submission
        $request->validate([
            'laporan_id' => 'required|exists:laporan,id',
            'feedback_content' => 'required|string|max:255',
        ]);

        // Store the feedback
        $feedback = new Feedback();
        $feedback->laporan_id = $request->input('laporan_id');
        $feedback->feedback_content = $request->input('feedback_content');
        $feedback->save();

        // Redirect back to the dashboard with a success message
        return redirect()->back();
    }




    
}