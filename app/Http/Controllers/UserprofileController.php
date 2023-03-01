<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Storage;
use Auth;
use kota;
use PDF;

class UserprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getAllUser() {
        $data_user = User::all();

        return view('user.datauser',compact('data_user'));
    }
    
    public function cari(Request $request)
    {
        $cari = $request->cari;
        $data_user = User::where('Name', 'LIKE', '%'.$cari.'%')->get();

        return view('user.datauser',compact('data_user'));
    }
    
    public function getuser()
    {
        if (request()->cari) {
            $data_user = User::where('Name', 'LIKE', '%'.request()->cari.'%')->get();
        } else{
            $data_user = User::all();
        }
        //$data_user = User::all();
 
    	$pdf = PDF::loadview('user.pdf',compact('data_user'));
    	return $pdf->download('Peduli-Diri.pdf');
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        if (Auth::user()->role == 'user') {
            if ($request->file('foto') == null) {
               $foto = $request->user()->foto;
            }else {
                $foto = $request->file('foto')->store('foto');
            }
            
        } else{
            $foto = "";
        }

        $request->user()->update([
            'nik'        => $request->nik,
            'name'       => $request->name,
            'telp'       => $request->telp,
            'email'      => $request->email,
            'foto'       => $foto,
            'username'   => $request->username,
            'alamat' =>$request->alamat
        ]);

        return redirect()->back();
    }

    public function changepassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        
        if(!(strcmp($request->get('new-password'), $request->get('new-password-confirm'))) == 0){
         //New password and confirm password are not same
          return redirect()->back()->with("error","New Password should be same as your confirmed password. Please retype new password.");
        }
         
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->password_confirmation = bcrypt($request->get('new-password'));
        $user->save();
             
        return redirect()->back()->with("success","Password changed successfully !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
