<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
        // Berfinsi menampilkan da ta peminjaman nya
        public function tampilData()
        {
            $inventory = Inventory::all();
            return view('item_inventory', compact('inventory'));
        }

        //unutk yang ini berfungsi sebagai"mengisi data iventaris yang baru
        public function store(Request $request)
        {
            $inventory = new Inventory;

            if($request->hasfile('gambar_item'))
            {
                $file = $request->file('gambar_item');
                $extenstion = $file->getClientOriginalExtension();
                $namaFile = time().'.'.$extenstion;
                $file->move('uploads/inventory/', $namaFile);
                $inventory->gambar_item = $namaFile;
            }

            // ambil data dari form dan menyimpan ke instance Inventory
            $inventory->nama_item = $request->input('nama_item');
            $inventory->harga_item = $request->input('harga_item');
            $inventory->jumlah = $request->input('jumlah');
            $inventory->satuan = $request->input('satuan');
            $inventory->save();

            return redirect()->back()->with('satus', 'inventori barang berhasil ditambahkan');
        }

        //supaya menampilkan halaman ubah data inventaris
        public function mengubahData($id)
        {
            $inventory = Inventory::find($id);
            return view('ubah_inventory', compact('inventory'));
        }

        // unutk edit data yang ingin di ubah
        public function ubahData(Request $request, $id)
        {
            $inventory = Inventory::find($id);

            if($request->hasfile('gambar_item'))
            {
                $file = $request->file('gambar_item');
                $extenstion = $file->getClientOriginalExtension();
                $namaFile = time().'.'.$extenstion;
                $file->move('uploads/inventory/', $namaFile);
                $inventory->gambar_item = $namaFile;
            }

            //untuk ambil data yang sidah di udate
            $inventory->nama_item = $request->input('nama_item');
            $inventory->harga_item = $request->input('harga_item');
            $inventory->jumlah = $request->input('jumlah');
            $inventory->satuan = $request->input('satuan');
            $inventory->update();

            return redirect()->back();
        }

        // unutuk delete hapus data
        public function hapusData($id){
            $inventory = Inventory::find($id);
            $inventory->delete();
            return redirect()->back()->with('status','inventori berhasil dihapus');
        }
    }
