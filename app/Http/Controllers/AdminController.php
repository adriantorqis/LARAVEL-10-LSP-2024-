<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\LaporanSelesai;
use App\Models\Feedback;

class AdminController extends Controller
{
    public function getReportDetails($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('admin.report_details_modal', compact('laporan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = $request->input('status');
        $laporan->save();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function finishStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

    // Check if the status is 'selesai' (finished)
    if ($request->status == 'selesai') {
        // Update the status to 'Selesai' in the Laporan model
        $laporan->status = 'Selesai';
        $laporan->save();

        // Create a new record in the LaporanSelesai table
        LaporanSelesai::create([
            'nis' => $laporan->nis,
            'nama' => $laporan->nama,
            'kategori' => $laporan->kategori,
            'isi_laporan' => $laporan->isi_laporan,
            'tanggal_laporan' => $laporan->tanggal_laporan,
            'foto' => $laporan->foto,
            'alamat' => $laporan->alamat,
            'status' => 'Selesai', // Set the status to 'Selesai' in the LaporanSelesai table
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Laporan marked as Selesai.');
    } else {
        // If the status is not 'selesai', redirect back with an error message
        return redirect()->back()->with('error', 'Invalid status.');
    }
    }
            public function deleteLaporan($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->delete();
        return redirect()->back()->with('success', 'Laporan has been deleted successfully.');
    }
}
