<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Illuminate\Support\Facades\Hash;

class userAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::orderBy('name', 'asc');

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('aksi', function($data){
            return view('user.tambah')->with('data', $data);
        })
        ->make(true);
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:10'
        ],[
            'name.required' => 'nama wajib di isi',
            'username.required' => 'username wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email sudah ada yang pakai'
        ]);

        if($validasi->fails()){
            return response()->json(['errors'=>$validasi->errors()]);
        }else{
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            User::create($data);
            return response()->json(['success'=> 'data berhasil di simpan']);
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
        $data = User::where('id', $id)->first();
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
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:10'
        ],[
            'name.required' => 'nama wajib di isi',
            'username.required' => 'username wajib di isi',
            'email.required' => 'email wajib di isi',
            'email.unique' => 'email sudah ada yang pakai'
        ]);

        if($validasi->fails()){
            return response()->json(['errors'=>$validasi->errors()]);
        }else{
            $data = [
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
            User::find($id)->update($data);

            return response()->json(['success'=> 'data berhasil di simpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::destroy($user);
        return response()->json([
            'success' => 'Data Berhasil Di Hapus'
        ]);
    }
}
