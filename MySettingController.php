<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class MySettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __construct()
    {
        $this->middleware('auth:admin');
        if (!Auth::guard('admin')->check() || !Session::get('temph1')) {
            return redirect('/login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');

        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $setting = DB::select("CALL sp_chc_member ('sel_config','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')  ");

        // $setting = DB::select("CALL sp_chc_member ('upd_config','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','',' ',' ',' ',' ','','','','','','','','','','','','','','','') ");

        //dump('Hasil Setting:');
        // dump($setting);
        //dump('FINISH-------');

        // dd($setting);

        return view('mysetting', compact('setting'));
    }
    public function update(Request $request)
    {

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $browser = Session::get('browser');
        $ip = Session::get('ip');

        $status = "";
        if ($request->configisdarkmode == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->configisprofilepublic == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->configisnotifdevotional == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($request->configisusherenabled == "on") {
            $status = 1;
        } else {
            $status = 0;
        }
        // dump('aaaa');
        // dump('cek param i11 = ' . $id_member);
        // dump('bbbb');
        // dump('cek param i12 = ' . $request->configisdarkmode);
        // dump('cccc');
        // dump('cek param i13 = ' . $request->configisprofilepublic);
        // dump('dddd');
        // dump('cek param i14 = ' . $request->configisnotifdevotional);
        // dump('eeee');
        // dd('cek param i15 = ' . $request->configisusherenabled);

        // dd('finishzzzzzzzzzzzzzzzz');

        $setting = DB::select("CALL sp_chc_member ('upd_config','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id_member','$request->configisdarkmode','$request->configisprofilepublic','$request->configisnotifdevotional','$request->configisusherenabled','','','','','','','','','','','','','','','$status') ");
        // dump('cek param i11 = ' . $id_member);
        // dump('cek param i12 = ' . $request->configisdarkmode);
        // dump('cek param i13 = ' . $request->configisprofilepublic);
        // dump('cek param i14 = ' . $request->configisnotifdevotional);
        // dd('cek param i15 = ' . $request->configisusherenabled);
        // dd('cek param  = ' . $status);

        if (isset($setting[0]->message)) {
            return redirect('/logout_error');
        }
        return redirect('home')->with(['success' => 'Data berhasil diubah!']);
    }
}
