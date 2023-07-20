<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class BukuTamuController extends Controller
{
    public function index()
    {
        $tamu = BukuTamu::all();
        return view('tamu.index', compact('tamu'));
    }

    public function submitForm(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string|max:255',
            'kesan' => 'required|string',
            'pesan' => 'required|string',
            'pesan' => 'required|string',
        ],[
            'nama.required' => 'Kolom Nama harus diisi',
            'jenis_kelamin.required' => 'Pilih salah satu Jenis Kelamin',
            'alamat.required' => 'Kolom Alamat/Instansi harus diisi',
            'kesan.required' => 'Kolom Kesan harus diisi',
            'pesan.required' => 'Kolom Pesan harus diisi',
        ]);

        // Mendapatkan data gambar dari field input yang tersembunyi
        $imageData = $request->input('image');
        // Menghapus bagian "data:image/jpeg;base64," dari URI data gambar
        $imageData = str_replace('data:image/jpeg;base64,', '', $imageData);
        // Melakukan dekode pada data gambar yang terenkripsi dalam format base64
        $decodedImage = base64_decode($imageData);
        // Membuat nama berkas unik untuk gambar
        $filename = time() . '_' . uniqid() . '.jpg';
        // Menentukan jalur penyimpanan untuk gambar
        $publicPath = public_path('images/');
        // Menyimpan gambar ke jalur penyimpanan yang telah ditentukan
        file_put_contents($publicPath . $filename, $decodedImage);

        $bukuTamu = new BukuTamu();
        $bukuTamu->nama = $validatedData['nama'];
        $bukuTamu->jenis_kelamin = $validatedData['jenis_kelamin'];
        $bukuTamu->alamat = $validatedData['alamat'];
        $bukuTamu->kesan = $validatedData['kesan'];
        $bukuTamu->pesan = $validatedData['pesan'];
        $bukuTamu->image = $filename;
        // dd($bukuTamu);
        $bukuTamu->save();

        Alert::success('Sukses', 'Terima kasih telah mengisi')->persistent(true)->autoClose(3000);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tamu = BukuTamu::findOrFail($id);
        if ($tamu->image) {
            $fotoPath = storage_path('app/public/images/'. $tamu->image);
            //dd($fotoPath); // Cetak path untuk memverifikasi
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }
        $tamu->delete();
        Alert::info('Berhasil', 'Berhasil menghapus data kandidat')->persistent(true)->autoClose(3000);
        return redirect()->back();
    }
}
