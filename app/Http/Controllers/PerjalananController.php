<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_perjalanan;
use App\User;
use Auth;
use Carbon\Carbon; //untuk tanggal otomatis

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'admin'){
            if (request()->start_date) {
                $start_date = Carbon::parse(request()->start_date)->toDateString();
                $jalan = tb_perjalanan::where('tanggal',[$start_date])->get();
            } else {
                $jalan = tb_perjalanan::latest()->get();
            }
            //$jalan = tb_perjalanan::latest()->get();
        } else {
            if (request()->start_date) {
                $start_date = Carbon::parse(request()->start_date)->toDateString();
                $jalan = tb_perjalanan::where('tanggal',[$start_date])->get();
            } else {

               $jalan = tb_perjalanan::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
            }
            
        } 
        return view('perjalanan.index', compact('jalan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $data = Carbon::now();
        $date = $data->toDateString();
        $time = $data->toTimeString();
        return view('perjalanan.create', compact('users', 'data', 'date', 'time'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $j = [
            
            'tanggal'   =>$request->tanggal,
            'jam'       =>$request->jam,
            'lokasi'    =>$request->lokasi,
            'suhu_tubuh'=>$request->suhu_tubuh,
            'user_id' => Auth::user()->id
        ];

        tb_perjalanan::create($j);
        return redirect('/perjalanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userperjalanan = User::where('id', $id)->first();
        dd($userperjalanan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $per = tb_perjalanan::findOrFail($id);
        $per->delete();
        return back();
    }
    public function hapusall()
    {
        tb_perjalanan::truncate();
        return redirect('/perjalanan');
    }
}
