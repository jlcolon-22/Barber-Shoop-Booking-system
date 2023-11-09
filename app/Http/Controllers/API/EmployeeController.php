<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Reservation;
use App\Models\Branch;

class EmployeeController extends Controller
{
    public function appointment()
    {
           $branch = Branch::where('owner_id',Auth::user()->owner_id)->first();
        $appointments = Reservation::with('postInfo','branchInfo')->where('branch_id',$branch->id)->latest()->paginate(10);
      
        return view('employee.reservation',compact('appointments'));
    }
}
