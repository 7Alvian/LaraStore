<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // $keyword = $request->get('keyword');
        // $produk = Produk::paginate(3);
        // if($keyword){
        //     $produk = Produk::where("nama_barang","LIKE","%$keyword%")->get();
        // }

        $produk = Produk::when($request->keyword, function ($query) use($request){
            $query->where('nama_barang','like', "%{$request->keyword}%")
                ->orWhere('stok_barang', 'like', "%{$request->keyword}%")
                ->orWhere('harga_barang', 'like', "%{$request->keyword}%");
        })->paginate(3);

        $produk->appends($request->only('keyword'));

        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|max:50',
            'stok_barang' => 'required',
            'harga_barang' => 'required'
        ]);

        $produk = new Produk([
          'nama_barang' => $request->input('nama_barang'),
          'stok_barang' => $request->input('stok_barang'),
          'harga_barang' => $request->input('harga_barang')
        ]);
        $produk->save();
        return redirect('/')->with('success','Produk berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit',compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $request->validate([
            'nama_barang' => 'required|max:50',
            'stok_barang' => 'required',
            'harga_barang' => 'required'
        ]);

        $produk->nama_barang = $request->input('nama_barang');
        $produk->stok_barang = $request->input('stok_barang');
        $produk->harga_barang = $request->input('harga_barang');
        $produk->save();

        return redirect('/')->with('success','Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/')->with('success','Produk berhasil dihapus');
    }
}
