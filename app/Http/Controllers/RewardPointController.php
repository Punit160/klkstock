<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewardPoint;
use Illuminate\Support\Facades\DB;
use Session;

class RewardPointController extends Controller
{
    public function add_reward_point(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['Customer'] = DB::table('customer_groups')->select('*')->get();
        $data['rewardpoint'] = DB::table('reward_points')->where('company_id', $usercompany)->first();
        return view('client.setting.reward_point.reward-point',$data);
    }

    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        if($request->id && $request->company_id){
          DB::table('reward_points')->where('id', $request->id)->where('company_id', $request->company_id)->update(['sold_amt_per_point' => $request->sold_amt_per_point, 'get_point_amt' => $request->get_point_amt,
          'expiry_point' => $request->expiry_point, 'duration_type' => $request->duration_type, 'status' => $request->status ]);
        }
        else{
            $RewardPoint = new RewardPoint();
            $RewardPoint->sold_amt_per_point = $request->sold_amt_per_point;
            $RewardPoint->get_point_amt = $request->get_point_amt;
            $RewardPoint->expiry_point = $request->expiry_point;
            $RewardPoint->duration_type = $request->duration_type;
            $RewardPoint->status = $request->status;
            $RewardPoint->company_id = $usercompany;
            $RewardPoint->created_by = $useremployee;
            $RewardPoint->save();
        }
        return back()->with('status', 'Reward Point Added Successfully');
    }

}
