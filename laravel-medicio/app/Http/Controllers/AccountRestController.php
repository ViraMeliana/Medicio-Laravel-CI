<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AccountRest;

class AccountRestController extends Controller
{
    public function index($id)
    {
        $data = AccountRest::where('id',$id)->get();
    	if (count($data)>0) {
    		$res['message'] = "Success!";
    		$res['values'] = $data;
    		return response($res);
    	} else {
    		$res['message'] = "Empty!";
    		return response($res);
    	}
    }
    public function create(Request $request)
    {
    	$ac = new AccountRest();
    	$ac->username = $request->username;
    	$ac->email = $request->email;
    	$ac->password = $request->password;
    	$ac->role = $request->role;
    	$ac->ADDRESS = $request->ADDRESS;
    	$ac->FULL_NAME = $request->FULL_NAME;
    	$ac->PHONE_NUMBER = $request->PHONE_NUMBER;
    	if ($ac->save()) {
    		$res['message'] = "Success add data";
    		$res['value'] = "$ac";
    		return response($res);
    	}
    }
    public function update(Request $request, $id)
    {
    	$username = $request->username;
    	$email = $request->email;
    	$ADDRESS = $request->ADDRESS;
    	$FULL_NAME = $request->FULL_NAME;
    	$PHONE_NUMBER = $request->PHONE_NUMBER;

    	$ac = AccountRest::find($id);
    	$ac->username = $username;
    	$ac->email = $email;
    	$ac->ADDRESS = $ADDRESS;
    	$ac->FULL_NAME = $FULL_NAME;
    	$ac->PHONE_NUMBER = $PHONE_NUMBER;

    	if ($ac->save()) {
    		$res['message'] = "Success update data";
    		$res['value'] = "$ac";
    		return response($res);
    	} else {
    		$res['message'] = "Failed!";
    		return response($res);
    	}
    }
    public function delete($id)
    {
    	$ac = AccountRest::where('id',$id);
    	if ($ac->delete()) {
    		$res['message'] = "Success deleted data!";
    		return response($res);
    	} else {
    		$res['message'] = "Failed!";
    		return response($res);
    	}
    }
}
