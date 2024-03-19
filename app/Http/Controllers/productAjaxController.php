<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class productAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::with('pegawai');

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($data){
            return view('product.tambah')->with('data', $data);
        })
        ->editColumn('nama', function($data){
            return $data->pegawai->nama;
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'nama' => 'required',
            'product' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ],[
            'nama.required' => 'nama wajib di isi',
            'product.required' => 'product wajib di isi',
            'price.required' => 'price wajib di isi',
            'stock.required' => 'stock wajib di isi',
            'description.required' => 'description wajib di isi'
        ]);

        if($validasi->fails()){
            return response()->json(['errors'=>$validasi->errors()]);
        }else{
            $data =
            [
                'nama' => $request->nama,
                'product' => $request->product,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description
            ];
            Product::create($data);
            return response()->json(['success'=>'data berhasil di simpan']);
        }
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
        $data = Product::where('id', $id)->first();
        return response()->json(['result'=>$data]);
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
        $validasi = Validator::make($request->all(),[
            'nama' => 'required',
            'product' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required'
        ],[
            'nama.required' => 'nama wajib di isi',
            'product.required' => 'product wajib di isi',
            'price.required' => 'price wajib di isi',
            'stock.required' => 'stock wajib di isi',
            'description.required' => 'description wajib di isi'
        ]);

        if($validasi->fails()){
            return response()->json(['errors'=>$validasi->errors()]);
        }else{
            $data =
            [
                'nama' => $request->nama,
                'product' => $request->product,
                'price' => $request->price,
                'stock' => $request->stock,
                'description' => $request->description
            ];
            Product::find($id)->update($data);
            return response()->json(['success'=>'data berhasil update']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
    }
}
