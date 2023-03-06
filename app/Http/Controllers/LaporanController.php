<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelaporan;
use App\Models\Siswa;
use App\Models\Kategori;
use App\Models\Aspirasi;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lapors = Pelaporan::latest()->get();
        return view('laporan.index', Compact('lapors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/') ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'siswa_id'=>'required',
            'ket_kategori'=>'required',
            'lokasi'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|mimes:png,jpeg,jpg'
            ]);

            $foto = $request->file('foto');
            $name =
            time().'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $foto->move($destinationPath, $name);

            $kode = time() . '-'. $request->get('siswa_id');

            Pelaporan::create([
                'siswa_id'=>$request->get('siswa_id'),
                'kategori_id'=>$request->get('ket_kategori'),
                'lokasi'=>$request->get('lokasi'),
                'keterangan'=>$request->get('keterangan'),
                'foto'=>$name,
                'kode'=>$kode,
                ]);
                return redirect()->back()->with('message', $kode);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lapor =  Pelaporan::find($id);
        return view('laporan.detail',compact('lapor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lapor =  Pelaporan::find($id);
        return view('laporan.edit',compact('lapor'));
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
        $this->validate($request, [
            'nama'=>'required',
            'ket_kategori'=>'required',
            'lokasi'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|mimes:png,jpeg,jpg'
            ]);

        $lapor = Pelaporan::find($id);
        $name = $lapor->foto;
        if($request->hasFile('foto')){
            $foto = $request->file('foto');
            $name = time().'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $foto->move($destinationPath,$name);
        }

        Siswa:: where('id',$request->nama)->update([
            'nama'=>$request->get('nama'),
        ]);

        Kategori:: where('id',$request->ket_kategori)->update([
            'ket_kategori'=>$request->get('ket_kategori'),
        ]);


        $lapor->lokasi =  $request->get('lokasi');
        $lapor->keterangan =  $request->get('keterangan');
        $lapor->foto = $name;
        $lapor->save();

        return redirect('laporan')->with('message', 'Laporan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lapor = Pelaporan::find($id);
        $lapor->delete();
        return
        redirect()->back()->with('message','Laporan berhasil dihapus');
    }

    public function inputlapor(Request $request){
        $this->validate($request, [
            'nama'=>'required',
            'ket_kategori'=>'required',
            'lokasi'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|mimes:png,jpeg,jpg'
            ]);

            $foto = $request->file('foto');
            $name =
            time().'.'.$foto->getClientOriginalExtension();
            $destinationPath = public_path('/image');
            $foto->move($destinationPath, $name);

            Pelaporan::create([
                'siswa_id'=>$request->get('nama'),
                'kategori_id'=>$request->get('ket_kategori'),
                'lokasi'=>$request->get('lokasi'),
                'keterangan'=>$request->get('keterangan'),
                'foto'=>$name,
                ]);
                return redirect()->back()->with('message', 'Laporan berhasil ditambahkan');
    }

    public function profile(){
        return view('profile');
    }

    public function listlapor(){
        return view('listlapor', [
            'pelaporans' => Pelaporan::latest()->Filter(request(['search']))->paginate(20)->withQueryString(),
        ]);
    }
}
