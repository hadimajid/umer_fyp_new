<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Hopeewinner;
use App\Http\Resources\Feedback as FeedbackResource;
use App\Kameeti;
use App\Loan;
use App\Set;
use App\Tid;
use App\Withdraw;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;

class UserDashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except('deposit','depositamount','depositamountsuccess');
    }


    public function active()
    {
        $user = Auth::user();
        $sets = $user->sets()->where('state','active')->get();
        return view('dashboard.active',compact('sets'));
    }
    public function perday(Set $set)
    {
        return view('dashboard.payment',compact('set'));
    }
    public function deposit(Set $set)
    {
        return view('dashboard.deposit');
    }
    public function depositamount(Request $request)
    {
        $data = $request->validate([
            'amount' => 'integer:required'
        ]);

        $amount = reset($data);

        return view('dashboard.depositamount',compact('amount'));
    }
    public function depositamountsuccess(Request $request,$amount)
    {
        $user = Auth::user();
        $data = $request->validate([
            'tid' => 'string:required',
            'source' => ''
        ]);

        $newtid = reset($data);
        $tids = Tid::all();
        foreach ($tids as $tid){
            if ($newtid == $tid->tid)
                return redirect()->route('front.index')->withErrors(['This Tid is already submitted', 'The Message']);
        }
        $client = new Client();
        $res = $client->request('GET', 'https://semysms.net/api/3/inbox_sms.php?token=d67ea79fff97c460d25ea43ab4d44015&device=231970&phone=9225&data_start=2015-01-27 13:03:42&date_end=2021-01-27 13:03:42');

        $apiresult = $res->getBody()->getContents();

        if (strpos($apiresult, $newtid) !== false && strpos($apiresult, $amount) !== false) {
            $tid = new Tid();
            $tid->tid = $newtid;
            $tid->amount = $amount;
            $tid->save();

            $user->addCredits($amount);


            return redirect()->route('front.index')->withErrors(['Payment Has Been Done Successfully Your funds has been updated', 'The Message']);
        }
        else {
            if ($data['source'] == 'EasyPaisa') {
                $client = new Client();
                $res = $client->request('GET', 'https://semysms.net/api/3/inbox_sms.php?token=d67ea79fff97c460d25ea43ab4d44015&device=231970&phone=3737&data_start=2015-01-27 13:03:42&date_end=2021-01-27 13:03:42');

                $apiresult = $res->getBody()->getContents();

                if (strpos($apiresult, $newtid) !== false && strpos($apiresult, $amount) !== false) {
                    $tid = new Tid();
                    $tid->tid = $newtid;
                    $tid->save();

                    $user->addCredits($amount);


                    return redirect()->route('front.index')->withErrors(['Payment Has Been Done Successfully Your funds has been updated', 'The Message']);
                } else {
                    return redirect()->route('front.index')->withErrors(['Payment Has Not Been Done Successfully Your funds has been updated', 'The Message']);
                }
            } else {
                $client = new Client();
                $res = $client->request('GET', 'https://semysms.net/api/3/inbox_sms.php?token=d67ea79fff97c460d25ea43ab4d44015&device=231970&phone=8558&data_start=2015-01-27 13:03:42&date_end=2021-01-27 13:03:42');

                $apiresult = $res->getBody()->getContents();

                if (strpos($apiresult, $newtid) !== false && strpos($apiresult, $amount) !== false) {
                    $tid = new Tid();
                    $tid->tid = $newtid;
                    $tid->save();

                    $user->addCredits($amount);


                    return redirect()->route('front.index')->withErrors(['Payment Has Been Done Successfully Your funds has been updated', 'The Message']);
                } else {
                    return redirect()->route('front.index')->withErrors(['Payment Has Not Been Done Successfully Your funds has been updated', 'The Message']);
                }
            }
        }

    }
    public function payment($set)
    {
        $set = Set::find($set);
        $user = Auth::user();
        $pivot = $user->sets()->where('set_id', $set->id)->get()->first()->pivot;
        $amountdeposited = $pivot->amountdeposited;

        if ($pivot->yesterdaypayment) {
            if (decrypt($user->credit->amount)>=$set->perday){

                $set->Users()->updateExistingPivot($user->id, [
                'todaypayment' => true,
                'amountdeposited' => $amountdeposited + $set->perday,
            ]);
            $user->deductCredits($set->perday);
            }
            else
                return redirect()->route('userdash.creditdep')->withErrors(['You don\'t Have any fund please deposit first', 'The Message']);
        }
        else{
            if (decrypt($user->credit->amount)>=($set->perday+$set->perday/100*50)) {
                $set->update([
                    'todaypayment' => true,
                    'amountdeposited' => $amountdeposited + $set->perday,
                    'extras' => $set->extras + $set->perday / 100 * 50
                ]);

                $user->deductCredits($set->perday + $set->perday / 100 * 50);
            }
            else
                return redirect()->route('userdash.creditdep')->withErrors(['You don\'t Have any fund please deposit first', 'The Message']);
        }
        return redirect()->route('userdash.active');
    }

    public function history()
    {
        $user = Auth::user();
        $sets = $user->sets()->where('state','history')->get();
        return view('dashboard.history',compact('sets'));
    }
    public function rating()
    {


        $feeds = Feedback::all()->where('set_id',null);
        return view('dashboard.rating', compact('feeds'));
    }

    public function registered(){
        $user = Auth::user();

        $sets = $user->sets()->where('state','registration')->get();
        return view('dashboard.registration',compact('sets'));
    }


    public function creditwithdraw(){

        return view('dashboard.withdrawamount');

    }
    public function hopeewithdraw(){
        $user = Auth::user();
        $hopee = Hopeewinner::where('user_id',$user->id)->get();
        if ($hopee->where('iban',null)->first()) {
            $hopee = $hopee->where('iban', null)->first();
            switch ($hopee->number) {
                case '1st':
                    $amount = $hopee->set()->first()->firsthopee;
                    break;
                case '2nd':
                    $amount = $hopee->set()->first()->secondhopee;
                    break;
                case '3rd':
                    $amount = $hopee->set()->first()->thirdhopee;
                    break;
            }
            return view('dashboard.hopeewithdraw', compact('amount'));
        }
        else
            return redirect()->back()->withErrors(['You have not any pending hopee', 'The Message']);
    }
    public function creditwithdrawalrequest(Request $request){


        $data = $request->validate([
            'number' => 'string:required',
            'amount' => 'integer:required',
            'source' => '',
        ]);

        $data = array_merge($data,['user_id' => Auth::id()]);
        $user = Auth::user();
        if ($data['amount']<=decrypt($user->credit->amount)){
            $user->deductCredits($data['amount']);
            Withdraw::create($data);
            return redirect()->route('front.index')->withErrors(['You will receive payment in 24-48 hours', 'The Message']);
        }
        else
            return redirect()->back();

    }
    public function hopeewithdrawalrequest(Request $request){

        $user = Auth::user();

        $hopee = Hopeewinner::where('user_id',$user->id)->get();
        $hopee = $hopee->where('iban', null)->first();
        $data = $request->validate([
            'contact' => 'string:required',
            'iban' => 'string:required',
            'amount' => 'integer:required',
            'source' => '',
        ]);
        if ($data['amount']<=decrypt($user->credit->amount)){
            $user->deductCredits($data['amount']);
            $hopee->update([
                'iban' => $data['iban'],
                'banktype'=> $data['source'],
                'contact'=> $data['contact'],
                'withdrawamount' => $data['amount']
            ]);
            return redirect()->route('front.index')->withErrors(['You will receive payment in 24-48 hours', 'The Message']);
        }
        else
            return redirect()->back()->withErrors(['You are low on your credits', 'The Message']);

    }

    public function kameeti(){
        return view('frontend.kameeti');
    }
    public function getKameetiList(Request $request){
        $page=0;
        $limit=12;
        if ($request->length){
            $limit=$request->length;
        }
        if($request->page){
            $page=($request->page-1)*$limit;
        }
        $kameetis=Kameeti::offset($page)->limit($limit)->get();
        $total=Kameeti::all()->count();

        return Response::json(['view'=>view('frontend.kameeti-card',compact('kameetis'))->render(),'total'=>$total,'length'=>$limit]);
    }
    public function getRegisterKameeti(Request $request,$kameeti_id){
        $kameeti=Kameeti::findOrFail($kameeti_id);
        return view('frontend.kameeti-register',compact('kameeti'));
    }
    public function registerKameeti(Request $request,$kameeti_id){
        $kameeti=Kameeti::findOrFail($kameeti_id);
        $validateDate=$request->validate([
            'cnic_front'=>'required|mimes:jpeg,png,jpg',
            'cnic_back'=>'required|mimes:jpeg,png,jpg',
            'signature'=>'required|mimes:jpeg,png,jpg',
        ]);

        $user=Auth::guard('web')->user();

        if($user && $user->kameetis->find($kameeti_id)){
            return redirect()->back()->with('danger',"Already applied to register on this kameeti.");

        }
        if($request->hasFile('cnic_front')){
            $cnicFront=$request->file('cnic_front');
            $cnicFrontName=$user->username.date('dmY')."cnic_front.".$cnicFront->getClientOriginalExtension();
            $cnicFront->move(public_path('kameetiUpload'),$cnicFrontName);
        }
        if($request->hasFile('cnic_back')){
            $cnicBack=$request->file('cnic_back');
            $cnicBackName=$user->username.date('dmY')."cnic_back.".$cnicBack->getClientOriginalExtension();
            $cnicBack->move(public_path('kameetiUpload'),$cnicBackName);
        }
        if($request->hasFile('signature')){
            $signature=$request->file('signature');
            $signatureName=$user->username.date('dmY')."signature.".$signature->getClientOriginalExtension();
            $signature->move(public_path('kameetiUpload'),$signatureName);
        }
        $kameeti->users()->attach($user->id,[
            'cnic_front'=>asset("kameetiUpload/".$cnicFrontName),
            'cnic_back'=>asset("kameetiUpload/".$cnicBackName),
            'signature'=>asset("kameetiUpload/".$signatureName),
        ]);
            return redirect()->back()->with('success',"Kameeti will get register after verification.");

    }
    public function budget(){
        return view('frontend.budget');
    }
    public function loan(){
        return view('frontend.loan');
    }
    public function submitLoan(Request $request){
        $validateDate=$request->validate([
            'cnic_front'=>'required|mimes:jpeg,png,jpg',
            'cnic_back'=>'required|mimes:jpeg,png,jpg',
            'signature'=>'required|mimes:jpeg,png,jpg',
            "amount"=>"required|numeric|min:10000"
        ]);

        $user=Auth::guard('web')->user();

        if($request->hasFile('cnic_front')){
            $cnicFront=$request->file('cnic_front');
            $cnicFrontName=$user->username.date('dmY')."cnic_front.".$cnicFront->getClientOriginalExtension();
            $cnicFront->move(public_path('loanUpload'),$cnicFrontName);
        }
        if($request->hasFile('cnic_back')){
            $cnicBack=$request->file('cnic_back');
            $cnicBackName=$user->username.date('dmY')."cnic_back.".$cnicBack->getClientOriginalExtension();
            $cnicBack->move(public_path('loanUpload'),$cnicBackName);
        }
        if($request->hasFile('signature')){
            $signature=$request->file('signature');
            $signatureName=$user->username.date('dmY')."signature.".$signature->getClientOriginalExtension();
            $signature->move(public_path('loanUpload'),$signatureName);
        }
        $loan=new Loan([
            'cnic_front'=>asset("loanUpload/".$cnicFrontName),
            'cnic_back'=>asset("loanUpload/".$cnicBackName),
            'signature'=>asset("loanUpload/".$signatureName),
            'amount'=>$request->amount,
            'user_id'=>$user->id
        ]);
        $loan->save();
        return redirect()->back()->with('success',"Our representative will contact you after verification.");

    }

}
