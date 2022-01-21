<?php

namespace App\Http\Controllers;

use App\Mail\InvitationDataSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function emailClientData(Request $request) {
        $request->validate([
            'fullName' => 'required|min:10',
            'phoneNumber' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->all();

        $user = (object)[
            'email' => 'contact@etunes.lk',
            'name' => $request->fullName,
        ];

        Mail::to($user)->queue(new InvitationDataSubmitted($data));

        return redirect(route('client.getstarted'));
    }
}
