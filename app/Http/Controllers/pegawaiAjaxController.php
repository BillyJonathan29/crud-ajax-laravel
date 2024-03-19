<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class pegawaiAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = pegawai::orderBy('nama', 'asc');

        return DataTables::of($pegawai)
        ->addIndexColumn()
        ->addColumn('aksi', function($pegawai){
            return view('pegawai.tombol')->with('pegawai', $pegawai);
        })
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'image' => 'required',
            'email' => 'required|email',
        ],[
            'nama.required' => 'Nama wajib di isi',
            'image.required' => 'Image wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib benar'
        ]);

        if($validasi->fails()){
            return response()->json([
                'code'=>0, 'errors'=>$validasi->errors()->toArray()
            ]);
        } else {

            $data =
            [
                'nama' => $request->nama,
                'image' => $request->image,
                'email' => $request->email
            ];
            pegawai::create($data);
            return response()->json(
                ['success'=>"Berhasil Menyimpan data"]
            );
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = pegawai::where('id', $id)->first();
        return response()->json(['result' => $data]);
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
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'email' => 'required|email',
        ],[
            'nama.required' => 'Nama wajib di isi',
            'image.required' => 'Image wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email wajib benar'
        ]);

        if($validasi->fails()){
            return response()->json([
                'errors'=>$validasi->errors()
            ]);
        }else{

            $data =
            [
                'nama' => $request->nama,
                'image' => $request->image,
                'email' => $request->email
            ];
            pegawai::where('id',$id)->update($data);
            return response()->json(['success'=>"Berhasil Melakukan update data"]);
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
        pegawai::where('id', $id)->delete();
    }
}
