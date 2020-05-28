<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //runquerybuilder
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::table('users')->get(); //getdata
    	return view('account',['res'=>$res]);
    }
    public function coba()
    {
    	return view('coba');
    }

    public function addAccount(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
            'full_name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'numeric']
        ]);
        DB::table('users')->insert([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'FULL_NAME' => $request->full_name,
            'ADDRESS' => $request->address,
            'PHONE_NUMBER' => $request->phone_number
        ]);
        return redirect('/home');
    }
    
	public function edit($id)
    {
       
    	$med = DB::table('medicine')->where('ID_MEDICINE',$id)->get();
        return view('edit', ['med'=>$med]);
    }

    public function update(Request $request)
    {
        $client = new Client();
        $client->request('PUT','http://localhost/medicio/index.php/api/medicioapi',
        [
            'form_params' => [
                'ID_MEDICINE' => $request->ID_MEDICINE,
                'ID_CATEGORY' => $request->ID_CATEGORY,
                'MED_NAME' => $request->MED_NAME,
                'PRICE' => $request->PRICE,
                'DESC_MED' => $request->DESC_MED
            ]
        ]);
        return redirect('/med');
    }

    public function editCat($id)
    {
    	$cat = DB::table('category')->where('ID_CATEGORY',$id)->get();
        return view('editCat', ['cat'=>$cat]);
    }

  
    public function updateCat(Request $request)
    {
    
        $client = new Client();
        $client->request('PUT', 'http://localhost/medicio/index.php/api/categoryapi',[
            'form_params' => [
                'ID_CATEGORY' => $request->ID_CATEGORY,
                'CAT_NAME' => $request->CAT_NAME
            ]
        ]);
        return redirect('/cat');

    }
    public function medicine()
    {
        $client = new Client();
		$request = $client->get('http://localhost/medicio/index.php/api/medicioapi');
        $response = $request->getBody()->getContents();
        $invoice = collect(json_decode($response, true))->collapse()->all(); //return data into simple array with collect()
        
        $res = DB::table('category')->get();
        return view('medicine', ['med'=>$invoice, 'cat'=>$res]);
    }
    public function deletemed($invoice)
    {
        $client = new Client();
            
            $options = ['debug' => false, 'form_params' => ['ID_MEDICINE' => $invoice]];
            $client->delete('http://localhost/medicio/index.php/api/medicioapi', $options);
            
            return back();
    }
    public function cat()
    {
        $client = new Client();
		$request = $client->get('http://localhost/medicio/index.php/api/categoryapi');
        $response = $request->getBody()->getContents();
        $invoice = collect(json_decode($response, true))->collapse()->all(); //return data into simple array with collect()
        
        return view('cat', ['cat'=>$invoice]);
    }
    public function deletecat($invoice)
    {
        $client = new Client();
            
            $options = ['debug' => false, 'form_params' => ['ID_CATEGORY' => $invoice]];
            $client->delete('http://localhost/medicio/index.php/api/categoryapi', $options);
            
            return back();
    }
    //
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCat(Request $request)
    {
        $client = new Client();
        $client->request('POST', 'http://localhost/medicio/index.php/api/categoryapi',[
            'form_params' => [
                'CAT_NAME' => $request->CAT_NAME
            ]
        ]);
        return redirect('/cat');
    }
    public function createMed(Request $request)
    {
        $client = new Client();
        $client->request('POST', 'http://localhost/medicio/index.php/api/medicioapi',[
            'form_params' => [
                'ID_CATEGORY' => $request->ID_CATEGORY,
                'MED_NAME' => $request->MED_NAME,
                'IMAGE' => $request->IMAGE,
                'PRICE' => $request->PRICE,
                'DESC_MED' => $request->DESC_MED,
            ]
        ]);
        return redirect('/med');
    }
    public function transaction()
    {
        $res = DB::table('header_transaction')->get(); //getdata
    	return view('trans',['res'=>$res]);
    }
    public function detailTrans($kode)
    {
        $res = DB::table('transaction')->where('KODE_TRANSAKSI',$kode)->get();
    	return view('editTrans',['res'=>$res]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
