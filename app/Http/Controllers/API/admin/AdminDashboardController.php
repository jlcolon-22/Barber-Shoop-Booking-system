<?php

namespace App\Http\Controllers\API\admin;

use App\Models\Branch;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view("admin.Dashboard");
    }

    public function account()
    {

        $owners = User::where('role',2)->orderBy('id','desc')->paginate(8);
        return view("admin.Accounts",compact('owners'));
    }
    public function branch()
    {
        $owners = User::where('role',2)->latest()->get();
        $branches = Branch::with('ownerInfo')->latest()->paginate(8);
        return view('admin.Branch',compact('owners','branches'));
    }
    public function store_account(Request $request)
    {
        $user = User::query()->create([
            "firstname"=> ucfirst($request->firstname),
            "lastname"=> ucfirst($request->lastname),
            "email"=> $request->email,
            'role'=>2,
            'email_verified_at'=>now(),
            'password'=>Hash::make($request->password)
        ]);
        if($user)
        {
            $filename = time().'-owner.'.$request->profile->extension();
            $user->update([
                'profile'=> '/storage/owner/'.$filename
            ]);
            $request->profile->storeAs('public/owner',$filename);
        }
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
            $filename = time().'-owner.'.$request->profile->extension();
            unlink(substr($id->profile, 1));
            $id->update([
                'profile'=>'/storage/owner/'.$filename
            ]);
            $request->profile->storeAs('public/owner',$filename);
        }
    }

    public function store_branch(Request $request)
    {
        $branch = Branch::query()->create([
            'name'=>$request->name,
            'number'=>$request->number,
            'location'=>$request->location,
            'email'=>$request->email,
            'status'=>$request->status,
            'owner_id'=>$request->owner_id,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'lat_long'=>$request->lat_long,
        ]);

        if($branch)
        {
             $filename = time().'-branch.'.$request->photo->extension();
             $branch->update([
                'photo'=>'/storage/branch/'.$filename
             ]);
             $request->photo->storeAs('public/branch',$filename);
        }
    }
    public function update_branch(Request $request, Branch $id)
    {
        $id->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'location'=>$request->location,
            'email'=>$request->email,
            'status'=>$request->status,
            'owner_id'=>$request->owner_id,
        ]);

          if(!!$request->photo)
        {
             $filename = time().'-branch.'.$request->photo->extension();
             unlink(substr($id->photo, 1));
             $id->update([
                'photo'=>'/storage/branch/'.$filename
             ]);
             $request->photo->storeAs('public/branch',$filename);
        }
    }
}
