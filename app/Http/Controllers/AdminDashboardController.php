<?php

namespace App\Http\Controllers;

use App\Hopeewinner;
use App\Kameeti;
use App\KameetiUser;
use App\Loan;
use App\Set;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Array_;

class AdminDashboardController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function image(Set $set){

        $hopees = $set->hopees();
        return view('admin.dashboard.image',compact('hopees','set'));
    }
    public function imageupload(Request $request,Set $set){
        dd($request);
        $hopees = $set->hopees();
        return view('admin.dashboard.image',compact('hopees','set'));
    }


    public function active()   {
        $sets = Set::where('state','active')->get();
        return view('admin.dashboard.active',compact('sets'));
    }
    public function history(){
        $sets = Set::where('state','history')->get();
        return view('admin.dashboard.history',compact('sets'));
    }
    public function registration()   {
        $sets = Set::where('state','registration')->get();

        return view('admin.dashboard.registration',compact('sets'));
    }
    public function activeUsers()   {
        $users = User::has('sets')->get();
        return view('admin.dashboard.activeuser',compact('users'));
    }
    public function inactiveUsers()   {
        $users = User::doesnthave('sets')->get();
        return view('admin.dashboard.inactiveuser',compact('users'));
    }


    public function create()
    {
        return view('admin.dashboard.create');
    }


    public function store(Request $request)
    {
        $request->validate([
           'perday' => 'required|integer',
           'totaldays' => 'required|integer',
           'totalusers' => 'required|integer',
        ]);
        $set = new Set();
//        dd($request->perday * $request->totaldays * $request->totalusers);
        $set = $this->newSet($request,$set);

        $sets = Set::where('state','registration')->get();
        return view('admin.dashboard.registration',compact('sets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function show(Set $set)
    {
        //
    }


    public function edit(Set $set)
    {
        return view('admin.dashboard.edit',compact('set'));
    }


    public function update(Request $request, Set $set)
    {

        $request->validate([
            'perday' => 'required|integer',
            'totaldays' => 'required|integer',
            'totalusers' => 'required|integer',
        ]);

        $this->newSet($request,$set);

        $sets = Set::where('state','registration')->get();
        return view('admin.dashboard.registration',compact('sets'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Set  $set
     * @return \Illuminate\Http\Response
     */
    public function destroy(Set $set)
    {
        //
    }

    public function newSet($request,$set)
    {
        $set->perday = $request->perday;
        $set->totalday = $request->totaldays;
        $set->totalusers = $request->totalusers;
        $set->state = 'registration';
        $set->totalamount = $request->perday * $request->totaldays * $request->totalusers;
        $set->totalamountperperson = $request->perday * $request->totaldays;
        $set->returnperperson = $set->totalamountperperson / 100 * 79;
        $set->returnamount = $set->totalamount / 100 * 79 - ($set->returnperperson * 3);
        $set->firsthopee = $set->totalamount / 100 * 8.5;
        $set->secondhopee = $set->totalamount / 100 * 5;
        $set->thirdhopee = $set->totalamount / 100 * 3.5;
        $set->mycommission = $set->totalamount / 100 * 4 + ($set->returnperperson * 3);
        $set->jazzcommission = 0;
        $set->registereddate = now()->toDate();
        $set->save();
    }
    public function addKameeti(){
        return view('admin.dashboard.kameeti-add');
    }
    public function submitKameeti(Request $request){
        $validateData=$request->validate([
           'name'=>['required','unique:kameetis,name'],
           'duration'=>'required',
           'price'=>'required',
           'amount'=>'required',
        ]);
        $data=array_merge($validateData,['admin_id'=>auth()->guard('admin')->user()->id]);
        $kameeti=new Kameeti($data);
        $kameeti->save();
        return redirect()->back()->with('success',"Kameeti added successfully.");

    }
    public function kameetiList(){
        $kameetis=Kameeti::paginate(10);
        return view('admin.dashboard.kameeti-list',compact('kameetis'));
    }
    public function updateKameeti($id){
        $kameeti= Kameeti::findOrFail($id);

        return view('admin.dashboard.kameeti-update',compact('kameeti'));
    }
    public function submitUpdateKameeti(Request $request,$id){
        $kameeti= Kameeti::findOrFail($id);

        $validateData=$request->validate([
            'name'=>['required',Rule::unique('kameetis', 'id')->ignore($kameeti->id),],
            'duration'=>'required',
            'price'=>'required',
            'amount'=>'required',
        ]);
//        $data=array_merge($validateData,['admin_id'=>auth()->guard('admin')->user()->id]);
//        $kameeti=new Kameeti($data);
        $kameeti->update($validateData);
        return redirect()->back()->with('success',"Kameeti updated successfully.");

    }
    public function deleteKameeti(Request $request,$id){
        $kameeti= Kameeti::findOrFail($id);
        $kameeti->delete();
        return redirect()->back()->with('success',"Kameeti deleted successfully.");

    }
    public function kameetiRequestList(){
        $kameetis=KameetiUser::paginate(10);
        return view('admin.dashboard.kameeti-request',compact('kameetis'));
    }

    public function rejectKameetiRegister(Request $request,$user_id,$kameeti_id){
        $user=User::find($user_id);
        $user->kameetis()->updateExistingPivot($kameeti_id, [
            'registered' => 2,
        ]);
        $pivot=$user->kameetis()->find($kameeti_id);
        $user->kameetiNotifications()->attach($pivot->pivot);
        return redirect()->back()->with('success',"Kameeti request rejected successfully.");

    }
    public function approveKameetiRegister(Request $request,$user_id,$kameeti_id){
        $user=User::find($user_id);
        $user->kameetis()->updateExistingPivot($kameeti_id, [
            'registered' => 1,
        ]);
        $pivot=$user->kameetis()->find($kameeti_id);
        $user->kameetiNotifications()->attach($pivot->pivot);
        return redirect()->back()->with('success',"Kameeti request approved successfully.");

    }
    public function loanRequestList(){
        $loans=Loan::paginate(10);
        return view('admin.dashboard.loan-request',compact('loans'));
    }
    public function rejectLoanRegister(Request $request,$user_id,$kameeti_id){
        $loan=Loan::where("id",$kameeti_id)->where("user_id",$user_id)->first();
        $loan->approved=2;
        $loan->save();
        $user=User::find($user_id);
        $user->loanNotifications()->attach($loan);
        return redirect()->back()->with('success',"Loan request rejected successfully.");

    }
    public function approveLoanRegister(Request $request,$user_id,$kameeti_id){
        $loan=Loan::where("id",$kameeti_id)->where("user_id",$user_id)->first();
        $loan->approved=1;
        $loan->save();
        $user=User::find($user_id);
        $user->loanNotifications()->attach($loan);
        return redirect()->back()->with('success',"Loan request approved successfully.");

    }
}
