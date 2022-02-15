<?php

namespace App\Http\Controllers;

use App\Mail\InvitationDataSubmitted;
use App\Models\FeaturedVideo;
use App\Models\PageImage;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ClientController extends Controller
{
    // show the main page
    public function showMainPage()
    {
        $hImageModel = PageImage::firstOrCreate(['name' => 'header.image']);
        $sImageModel = PageImage::firstOrCreate(['name' => 'secondary.image']);
        $featuredVideos = FeaturedVideo::all();
        foreach($featuredVideos as $featuredVideo) {
            $featuredVideo->getFirstMediaUrl('video-images');
        }
        $artists = Artist::all();
        foreach ($artists as $artist) {
            $artist->getFirstMediaUrl('artist-images');
        }
        return Inertia::render('Home', [
            'himage' => $hImageModel->getFirstMediaUrl('page-images'),
            'simage' => $sImageModel->getFirstMediaUrl('page-images'),
            'featuredVideos' => $featuredVideos,
            'artists' => $artists,
        ]);
    }

    // send email with client data to contact@etunes.lk
    public function emailClientData(Request $request) {
        $request->validate([
            'select' => 'required',
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
