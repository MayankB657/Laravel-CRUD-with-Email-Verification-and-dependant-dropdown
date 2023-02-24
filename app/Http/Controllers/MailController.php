<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $received_mail = $request->email2;
        $received_name = $request->name2;
        return $this-> html_email($received_name,$received_mail);
    }

    private function html_email($name,$email) {
        $data = array('name'=>$name,'email'=>$email);
        Mail::send('mail', $data, function($message)use($email) {
           $message->to($email)->subject('Password Reset');
           $message->from('laravelmailsender7@gmail.com','Laravel');
        });
        echo "Email sent. Check your inbox to reset password.";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
