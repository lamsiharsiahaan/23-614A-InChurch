<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
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
    public function index($get_id)
    {
        // dd(Auth::guard('admin')->user()->id_member);
        // $slide = DB::select("CALL sp_landing ('sel_slideshow','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        // $aniv = DB::select("CALL sp_landing ('sel_anniversary','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        // $birthday = DB::select("CALL sp_landing ('sel_birthday','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        // $news = DB::select("CALL sp_landing ('sel_news','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        // $offering = DB::select("CALL sp_landing ('sel_offering','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        // $events = DB::select("CALL sp_landing ('sel_events','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        // dd($browser);
        // dump($temph1, $temph2, $temph3, $temph4, $id_member, $ip, $browser, $id_member);


        $profile = DB::select("CALL sp_chc_member ('sel_profile','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $expertise = DB::select("CALL sp_chc_member ('sel_profile_expertise_all','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $education = DB::select("CALL sp_chc_member ('sel_profile_education_all','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $occupation = DB::select("CALL sp_chc_member ('sel_profile_occupation_all','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $commission = DB::select("CALL sp_chc_member ('sel_profile_commission_all','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $ministry = DB::select("CALL sp_chc_member ('sel_profile_ministry_all','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        $listedu = DB::select("CALL sp_mst_education ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','') ");
        $listoccup = DB::select("CALL sp_mst_occupation ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')  ");
        $listexpertise = DB::select("CALL sp_mst_expertise ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')  ");
        $listcommission = DB::select("CALL sp_mst_commission ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $listministry = DB::select("CALL sp_mst_ministry ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')  ");
        // dd($profile);

        // if (isset($profile[0]->message) || isset($education[0]->message)) {
        // 	return redirect('/logout_error'); 
        // } 
        // dd($profile);

        return view('profile', compact('profile', 'education', 'expertise', 'occupation', 'commission', 'ministry', 'listedu', 'listoccup', 'listexpertise', 'listcommission', 'listministry', 'get_id'));
    }



    public function card($id, $get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $profile = DB::select("CALL sp_chc_member ('sel_profile','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','') ");
        return view('profile.card_profile', compact('profile', 'get_id'));
    }

    public function education_detail($id, $get_id)
    {
        $id = Crypt::decrypt($id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $listedu = DB::select("CALL sp_mst_education ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','') ");
        $data = DB::select("CALL sp_chc_member ('sel_profile_education_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($listedu[0]->message) || isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        // dd($data); 
        $data = $data[0];

        return view('profile.edit_edu', compact('listedu', 'data', 'get_id'));
    }

    public function self_desc($get_id)
    {
        $id_member = Auth::user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_selfdescription_one_member','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        // $education = DB::select("CALL sp_chc_member ('sel_profile_edu_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data);

        return view('profile.edit_self', compact('data', 'get_id'));
    }

    public function change_picture($get_id)
    {
        $id_member = Auth::user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dump($temph1);
        // dump($temph2);
        // dump($temph3);
        // dump($temph4);
        // dump($ip);
        // dump($browser);
        // dd('ya');
        $data = DB::select("CALL sp_chc_member ('sel_profile_selfdescription_one_member','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");

        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data);
        return view('profile.member_change_picture', compact('data', 'get_id'));
        // return view('profile.member_change_picture', compact('data', 'get_id'));
    }

    public function picturestore(Request $request)
    {
        
        $folderPath     = public_path('/images/profile/');
        $image_parts    = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);
        // $id_member = Auth::guard('admin')->user()->id_member;
        $id_member = Auth::user()->id_member;
        $imageName = uniqid() . '.png';

        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);

        $urlimg = url("/public/images/profile") . '/' . $imageName;

        // dd($urlimg);

        $saveimg = collect(DB::select('CALL sp_chc_member2 (?, "", "", "", "", "", "", "", "", "", "", ?, ?, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "")', [
            'upd_picture',
            $id_member,
            $urlimg
        ]))->first();

        return response()->json([
            'success' => $saveimg->success,
            'message' => $saveimg->message
        ]);
    }

    // public function selfstore(Request $request)
    // {
    //     $get_id = Crypt::decrypt($request->get_id);
    //     // $request->validate([
    //     //     'description' => 'required',
    //     // ]);
    //     $id_member = Auth::guard('admin')->user()->id_member;

    //     $temph1 = Session::get('temph1');
    //     $temph2 = Session::get('temph2');
    //     $temph3 = Session::get('temph3');
    //     $temph4 = Session::get('temph4');
    //     $ip = Session::get('ip');
    //     $browser = Session::get('browser');

    //     // $date = date('Y-m-d H:i:s');
    //     // dd($date);
    //     // dd();
    //     $desc = addslashes($request->description);
    //     DB::select("CALL sp_chc_member ('upd_profile_selfdescription_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','$desc','','','','','','','','','','','','','','','','')");
    //     return redirect('profile/' . $get_id)->with(['success' => 'Data berhasil diubah!']);
    // }

    // public function selfdelete(Request $request)
    // {

    //     $id_member = Auth::guard('admin')->user()->id_member;

    //     $temph1 = Session::get('temph1');
    //     $temph2 = Session::get('temph2');
    //     $temph3 = Session::get('temph3');
    //     $temph4 = Session::get('temph4');
    //     $ip = Session::get('ip');
    //     $browser = Session::get('browser');

    //     DB::select("CALL sp_chc_member ('del_profile_selfdescription_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id
    //         ','','','','','','','','','','','','','','','','','','','')");
    //     return redirect('profile/' . $get_id . '#page')->with(['success' => 'Data berhasil hapus!']);
    // }


    public function member($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($temph1, $temph2, $temph3, $temph4, $ip, $browser);

        $data = DB::select("CALL sp_chc_member ('sel_profile_membership_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $membertype = DB::select("CALL sp_mst_membertype ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','','','','','','','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($membertype); 

        return view('profile.edit_member', compact('data', 'get_id', 'membertype'));
    }

    public function memberstore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($temph1, $temph2, $temph3, $temph4, $ip, $browser);
        // dd($request->numberregistermember);
        DB::select("CALL sp_chc_member ('upd_profile_membership_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_membertype','','$request->numberregistermember','$request->numbermember','$request->dateinmembership','$request->dateoutmembership','$request->datechristening','$request->datebaptize','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pagemember')->with(['success' => 'Data berhasil diubah!']);
    }

    public function memberdelete($id)
    {

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_membership_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$id','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pagemember')->with(['success' => 'Data berhasil diubah!']);
    }

    public function contact($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_contact_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data); 

        return view('profile.edit_contact', compact('data', 'get_id'));
    }

    public function storecontact(Request $request)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $get_id = Crypt::decrypt($request->get_id);

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);

        $data = DB::select("CALL sp_chc_member ('upd_profile_contact_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','$request->email','$request->phone1','$request->phone2','$request->phone3','','','','','','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pagecontact')->with(['success' => 'Data berhasil diubah!']);
    }

    public function address($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_address_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $city = DB::select("CALL sp_mst_city ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $country = DB::select("CALL sp_mst_country ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $province = DB::select("CALL sp_mst_province ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data);

        return view('profile.edit_address', compact('data', 'get_id', 'city', 'country', 'province'));
    }

    public function storeaddress(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);

        $data = DB::select("CALL sp_chc_member ('upd_profile_address_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_country','$request->id_province','$request->id_city','$request->addressgoogle','$request->latitude','$request->longitude','$request->address','$request->addressremark','$request->zipcode','$request->isallowasvisitee','$request->addresscode','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pageaddress')->with(['success' => 'Data berhasil diubah!']);
    }

    public function family($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_family_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $member = DB::select("CALL sp_mst_statusmember ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $family = DB::select("CALL sp_mst_statusfamily ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $marriage = DB::select("CALL sp_mst_statusmarriage ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");

        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data); 	

        return view('profile.edit_family', compact('data', 'member', 'family', 'marriage', 'get_id'));
    }

    public function storefamily(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$ip,$browser,$request->id_statusfamily,$request->id_statusmarriage,$request->datemarriage);
        DB::select("CALL sp_chc_member ('upd_profile_family_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_statusfamily','$request->id_statusmarriage','$request->id_statusmember','$request->datemarriage','','','','','','','','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pagefamily')->with(['success' => 'Data berhasil diubah!']);
    }

    public function commission($id, $get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_commission_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        $commission = DB::select("CALL sp_mst_commission ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        // dd($id);    
        $data = $data[0];


        return view('profile.edit_commission', compact('data', 'commission', 'get_id'));
    }

    public function storecommission(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$ip,$browser,$request->id_statuscommission,$request->id_statusmarriage,$request->datemarriage);
        DB::select("CALL sp_chc_member ('upd_profile_commission_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$request->id_member_commission','','$request->id_commission','$request->yearfrom','$request->yearto','$request->notemembercommission','$request->iscurrentlyhere','','','','','','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pagecommission')->with(['success' => 'Data berhasil diubah!']);
    }

    public function setting($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_setting_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $commission = DB::select("CALL sp_mst_commission ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $termination = DB::select("CALL sp_mst_termination ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $level = DB::select("CALL sp_mst_level ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $field = DB::select("CALL sp_acc_field ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $church = DB::select("CALL sp_mst_church ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($field); 

        return view('profile.edit_setting', compact('data', 'commission', 'termination', 'level', 'church', 'field', 'get_id'));
    }

    public function storesetting(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);

        $data = DB::select("CALL sp_chc_member ('upd_profile_setting_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_level','$request->id_church','$request->id_field','$request->id_termination','','','$request->codemember','$request->isusercommission','$request->isactivated','','','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pagesetting')->with(['success' => 'Data berhasil diubah!']);
    }

    public function socialmedia($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_socialmedia_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $city = DB::select("CALL sp_mst_city ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data); 

        return view('profile.edit_socialmedia', compact('data', 'get_id'));
    }

    public function storesocialmedia(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);

        $data = DB::select("CALL sp_chc_member ('upd_profile_socialmedia_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','$request->facebook','$request->twitter','$request->instagram','$request->tiktok','$request->linkedin','','','','','','','','','','','','')");

        return redirect('profile/' . $get_id . '#pagesocialmedia')->with(['success' => 'Data berhasil diubah!']);
    }

    public function info($get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_basicinfo_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $gender = DB::select("CALL sp_mst_gender ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        $blood = DB::select("CALL sp_mst_blood ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $city = DB::select("CALL sp_mst_city ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $ethnic = DB::select("CALL sp_mst_ethnic ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $region = DB::select("CALL sp_mst_region ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $sector = DB::select("CALL sp_mst_sector ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $pooling = DB::select("CALL sp_mst_pooling ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        $wind = DB::select("CALL sp_mst_wind ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");

        // $education = DB::select("CALL sp_chc_member ('sel_profile_edu_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($data[0]->message) || isset($gender[0]->message) || isset($blood[0]->message) || isset($city[0]->message) || isset($ethnic[0]->message) || isset($region[0]->message) || isset($sector[0]->message) || isset($pooling[0]->message) || isset($wind[0]->message)) {
            return redirect('/logout_error');
        }
        // dd($data); 
        $data = $data[0];

        return view('profile.edit_info', compact('data', 'gender', 'blood', 'city', 'ethnic', 'region', 'sector', 'pooling', 'wind', 'get_id'));
    }

    public function infodelete()
    {

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_basicinfo_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#page')->with(['success' => 'Data berhasil diubah!']);
    }

    public function infostore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        // dd();
        $isallowasblooddonor = "";
        if ($request->isallowasblooddonor == null) {
            $isallowasblooddonor = "0";
        } else {
            $isallowasblooddonor = $request->isallowasblooddonor;
        }

        $isreborn = "";
        if ($request->isreborn == null) {
            $isreborn = "0";
        } else {
            $isreborn = $request->isreborn;
        }

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        // dd($request);
        DB::select("CALL sp_chc_member ('upd_profile_basicinfo_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_gender','$request->id_blood','$request->id_city','$request->id_ethnic','$request->id_region','$request->id_sector','$request->id_pooling','$request->id_wind','','$request->namemember','$request->nickname','$request->birthdate','$request->photomember','$isreborn','$isallowasblooddonor','','','','')");

        // dd(DB::select("CALL sp_chc_member ('sel_profile_basicinfo_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','','','','','','','','','','','','','','','','','','','')"));
        return redirect('profile/' . $get_id . '#pageinfo')->with(['success' => 'Data berhasil diubah!']);
    }

    public function ministry($id, $get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;
        $id = Crypt::decrypt($id);
        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');


        $data = DB::select("CALL sp_chc_member ('sel_profile_ministry_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        $ministry = DB::select("CALL sp_mst_ministry ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        // dd($id_member); 
        $data = $data[0];

        return view('profile.edit_ministry', compact('data', 'ministry', 'get_id'));
    }

    public function ministrystore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');
        // dd($request);

        DB::select("CALL sp_chc_member ('upd_profile_ministry_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$request->id_member_ministry','','$request->id_ministry','$request->datein','$request->dateout','$request->notememberministry','$request->iscurrentlyhere','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageministry')->with(['success' => 'Data berhasil diubah!']);
    }


    public function occupation($id, $get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;
        $id = Crypt::decrypt($id);
        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $data = DB::select("CALL sp_chc_member ('sel_profile_occupation_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        $occupation = DB::select("CALL sp_mst_occupation ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }
        $data = $data[0];
        // dd($data); 

        return view('profile.edit_occupation', compact('data', 'occupation', 'get_id'));
    }

    public function occupationstore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('upd_profile_occupation_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$request->id_member_occupation','$request->id_occupation','','$request->namecompany','$request->noteoccupation','$request->yearfrom','$request->yearto','','$request->notememberoccupation','$request->iscurrentlyhere','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageoccupation')->with(['success' => 'Data berhasil diubah!']);
    }

    public function expertise($id, $get_id)
    {
        $id = Crypt::decrypt($id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');




        $data = DB::select("CALL sp_chc_member ('sel_profile_expertise_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        $expertise = DB::select("CALL sp_mst_expertise ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')  ");
        // $education = DB::select("CALL sp_chc_member ('sel_profile_edu_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')  ");
        if (isset($data[0]->message)) {
            return redirect('/logout_error');
        }

        // $expertise = DB::select("CALL sp_mst_expertise ('sel_all_dropdown','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','','','','','','','','','','','','','','','','','','','')");
        // dd($expertise); 
        $data = $data[0];

        return view('profile.edit_expertise', compact('data', 'expertise', 'get_id'));
    }

    public function expertisestore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('upd_profile_expertise_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$request->id_member_expertise','$request->id_expertise','','$request->noteexpertise','','','','','','','','','','','','','','','','')");
        // dd($request);
        return redirect('profile/' . $get_id . '#pageexpertise')->with(['success' => 'Data berhasil diubah!']);
    }

    public function educationstore(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        // dd($request);
        $note = "";
        $education = DB::select("CALL sp_chc_member ('upd_profile_education_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$request->id_member_education','$request->id_education','','$request->nameuniversity','$request->noteuniversity','$request->yearfrom','$request->yearto','$request->isoverseas','$request->iscurrentlyhere','','','','','','','','','','','') ");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pageeducation')->with(['success' => 'Data berhasil diubah!']);
    }

    public function educationadd(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        // dd($request);
        $education = DB::select("CALL sp_chc_member ('ins_profile_education_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$get_id','$request->id_education','','$request->nameuniversity','$request->noteuniversity','$request->yearfrom','$request->yearto','$request->isoverseas','$request->iscurrentlyhere','','','','','','','','','','','') ");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pageeducation')->with(['success' => 'Data berhasil diubah!']);
    }

    public function occupationadd(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        // dd($request);
        $occupation = DB::select("CALL sp_chc_member ('ins_profile_occupation_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','$get_id','$request->id_occupation','$request->namecompany','$request->noteoccupation','$request->yearfrom','$request->yearto','$request->iscurrentlyhere','','','','','','','','','','','','')");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pageoccupation')->with(['success' => 'Data berhasil diubah!']);
    }

    public function expertiseadd(Request $request)
    {
        // dd($request);
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $expertise = DB::select("CALL sp_chc_member ('ins_profile_expertise_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','$get_id','$request->id_expertise','','$request->noteexpertise','','','','','','','','','','','','','','','')");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pageexpertise')->with(['success' => 'Data berhasil diubah!']);
    }

    public function commissionadd(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');


        // dd($request);
        $commission = DB::select("CALL sp_chc_member ('ins_profile_commission_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','$get_id','$request->id_commission','$request->yearfrom','$request->yearto','$request->notemembercommission','$request->iscurrentlyhere','','','','','','','','','','','','','')");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pagecommission')->with(['success' => 'Data berhasil diubah!']);
    }

    public function ministryadd(Request $request)
    {
        $get_id = Crypt::decrypt($request->get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        $ministry = DB::select("CALL sp_chc_member ('ins_profile_ministry_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','','$get_id','$request->id_ministry','$request->datein','$request->dateout','$request->notememberministry','$request->iscurrentlyhere','','','','','','','','','','','','','')");
        // dd($education);
        // dd($temph1,$temph2,$temph3,$temph4,$id_member,$request->id_member_education,$request->id_education,$request->nameuniversity,$request->noteuniversity,$request->yearin,$request->yearout);
        return redirect('profile/' . $get_id . '#pageministry')->with(['success' => 'Data berhasil diubah!']);
    }


    // Delete


    public function educationdelete($id, $get_id)
    {
        $id_member = Auth::guard('admin')->user()->id_member;
        $get_id = Crypt::decrypt($get_id);
        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_education_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageeducation')->with(['success' => 'Data berhasil hapus!']);
    }

    public function ministrydelete($id, $get_id)
    {

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_ministry_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageministry')->with(['success' => 'Data berhasil hapus!']);
    }

    public function expertisedelete($id, $get_id)
    {

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_expertise_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageexpertise')->with(['success' => 'Data berhasil hapus!']);
    }

    public function commissiondelete($id, $get_id)
    {
        $get_id = Crypt::decrypt($get_id);
        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_commission_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pagecommission')->with(['success' => 'Data berhasil hapus!']);
    }

    public function occupationdelete($id, $get_id)
    {
        $get_id = Crypt::decrypt($get_id);

        $id_member = Auth::guard('admin')->user()->id_member;

        $temph1 = Session::get('temph1');
        $temph2 = Session::get('temph2');
        $temph3 = Session::get('temph3');
        $temph4 = Session::get('temph4');
        $ip = Session::get('ip');
        $browser = Session::get('browser');

        DB::select("CALL sp_chc_member ('del_profile_occupation_one','$temph1','$temph2','$temph3','$temph4','$id_member','$ip','$browser','','','','$id','','','','','','','','','','','','','','','','','','','')");
        return redirect('profile/' . $get_id . '#pageoccupation')->with(['success' => 'Data berhasil hapus!']);
    }
}
