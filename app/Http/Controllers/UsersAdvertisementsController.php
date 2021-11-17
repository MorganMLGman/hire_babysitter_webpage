<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users_Advertisements;
use Illuminate\Support\Facades\Auth;


class UsersAdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = DB::table('users_advertisements AS pivot')
                        ->join('advertisements AS advert', 'advert.id', '=', 'pivot.id_advertisement')
                        ->join('users', 'users.id', '=', 'advert.id_user')
                        ->join('districts_advertisements', 'districts_advertisements.id_advertisement', '=', 'pivot.id_advertisement')
                        ->join('districts', 'districts.id', '=', 'districts_advertisements.id_district')
                        ->where('pivot.id_user', '=', Auth::user()->id)
                        ->where('pivot.time_to', '>', now())
                        ->get();
        //dd($data);
        return view('calendar', [

            'cals' =>$data
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Users_Advertisements  $users_Advertisements
     * @return \Illuminate\Http\Response
     */
    public function show(Users_Advertisements $users_Advertisements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users_Advertisements  $users_Advertisements
     * @return \Illuminate\Http\Response
     */
    public function edit(Users_Advertisements $users_Advertisements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users_Advertisements  $users_Advertisements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users_Advertisements $users_Advertisements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users_Advertisements  $users_Advertisements
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users_Advertisements $users_Advertisements)
    {
        //
    }
}
