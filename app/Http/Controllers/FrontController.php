<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Hopeewinner;
use App\Mail\ContactUs;
use App\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $data =
        $sets = Set::all()->where('state','registration')->chunk(3)->first();
        return view('frontend.index',compact('sets'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function optimize()
    {
        Artisan::call('optimize');
        return 'optimized';
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function latest()
    {
        $openSets = Set::all()->where('state','registration')->chunk(3)->first();

        $sets = Set::where('state','history')->get();

        return view('frontend.latest',compact('sets','openSets'));
    }
    public function feedbacks()
    {
        $feeds = Feedback::all()->where('set_id',null);
        return view('frontend.feedback',compact('feeds'));
    }
    public function contactUs(Request $request){
        $validateData=$request->validate([
           'name'=>'required',
           'email'=>'required|email',
           'message'=>'required',
        ]);

        try {
            Mail::send(new ContactUs($validateData));
            return redirect()->back()->with("success","We will contact you shortly.");

        }catch (\Exception $err){
//            dd($err);
            return redirect()->back()->with("danger","Some error has occurred");

        }
    }
}
