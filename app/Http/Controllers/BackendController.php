<?php

namespace App\Http\Controllers;

use App\Models\Backend\BloodDonation;
use App\Models\Donor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function index()
    {
        $bloodGroupApos = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 1)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalApos = $bloodGroupApos->sum('amount');

        $bloodGroupAmins = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 2)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalAmins = $bloodGroupAmins->sum('amount');

        $bloodGroupBpos = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 3)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalBpos = $bloodGroupBpos->sum('amount');

        $bloodGroupBmins = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 4)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalBmins = $bloodGroupBmins->sum('amount');

        $bloodGroupABpos = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 5)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalABpos = $bloodGroupABpos->sum('amount');

        $bloodGroupABmins = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 6)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalABmins = $bloodGroupABmins->sum('amount');

        $bloodGroupOpos = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 7)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalOpos = $bloodGroupOpos->sum('amount');

        $bloodGroupOmins = DB::table('users')
            ->join('blood_donations', 'users.id', '=', 'blood_donations.user_id')
            ->where('bg_id', 8)
            ->where('status', 1)
            ->select('amount')
            ->get();
        $totalOmins = $bloodGroupOmins->sum('amount');

        return view('home', compact('totalApos', 'totalAmins', 'totalBpos', 'totalBmins', 'totalABpos', 'totalABmins', 'totalOpos', 'totalOmins',));
    }
}
