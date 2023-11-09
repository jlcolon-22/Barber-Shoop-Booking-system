<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\User;
use App\Models\Post;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class FrontendController extends Controller
{
    public function services()
    {

        $branches = Branch::get();
        return view('pages.services',compact('branches'));
    }

    public function reservation(Request $request)
    {

        $offer = Post::query()->with('branch')->where('id',$request->q)->first();
       
        return view('pages.reservation',compact('offer'));
    } 

    public function store_reservation(Request $request)
    {

        Reservation::create([
            'firstname'=>$request->firstname,
            'email'=>$request->email,
            'lastname'=>$request->lastname,
            'number'=>$request->number,
            'time'=>$request->time['hours'].':'.$request->time['minutes'],
            'date'=>$request->date,
            'branch_id'=>$request->branch_id,
            'post_id'=>$request->post_id,
            'user_id'=>Auth::id(),
        ]);


    }
    public function appointment()
    {

        $appointments = Reservation::with('postInfo','branchInfo')->where('user_id',Auth::id())->latest()->paginate(10);
        return view('pages.appointment' ,compact('appointments'));
    } 
    public function update_appointment(Reservation $id)
    {

       $id->update([
        'status' => 2
       ]);
        return back();
    }
    public function account()
    {


        return view('pages.account');
    }

       public function update_account(Request $request ,User $id)
    {
        $id->update([
            "firstname"=> ucfirst($request->firstname),
            "lastname"=> ucfirst($request->lastname),
            "email"=> $request->email,
        ]);

        if(!!$request->password)
        {
            $id->update(['password'=>Hash::make($request->password)]);
        }
        if(!!$request->profile)
        {
            $filename = time().'-employee.'.$request->profile->extension();
            if($id->profile[0] != 'h')
            {
      unlink(substr($id->profile, 1));

            }
                  $id->update([
                'profile'=>env('APP_MAIN_DOMAIN').'/storage/employee/'.$filename
            ]);
            $request->profile->storeAs('public/employee',$filename);
        }

        return back()->with('success','true');
    }

    public function branch(Request $request)
    {
        $branch = Branch::query()->where('id',$request->q)->first();
        $owner = User::with('posts','certificates')->where('id',$branch->owner_id)->first();

        return view('pages.branch',compact('branch','owner'));
    }
}
