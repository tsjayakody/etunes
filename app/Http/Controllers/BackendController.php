<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\FeaturedVideo;
use App\Models\PageImage;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class BackendController extends Controller
{
    // show header, secondary image update page
    public function showImagePage()
    {
        $hImageModel = PageImage::firstOrCreate(['name' => 'header.image']);
        $sImageModel = PageImage::firstOrCreate(['name' => 'secondary.image']);
        return Inertia::render('Images', ['himage' => $hImageModel->getFirstMediaUrl('page-images'), 'simage' => $sImageModel->getFirstMediaUrl('page-images')]);
    }

    // show profile settings page
    public function showProfileSettings(Request $request)
    {
        return Inertia::render('ProfileSettings', ['user' => $request->user()]);
    }

    // show dashboard page
    public function showDashboardPage()
    {
        $header_image = PageImage::where('name', 'header.image')->first()->getFirstMediaUrl('page-images');
        $secondary_image = PageImage::where('name', 'secondary.image')->first()->getFirstMediaUrl('page-images');
        $featured_videos_count = FeaturedVideo::count();
        $artists_count = Artist::count();
        return Inertia::render('Dashboard', ['header_image' => $header_image, 'secondary_image' => $secondary_image, 'featured_videos_count' => $featured_videos_count, 'artists_count' => $artists_count]);
    }

    // show featured videos page
    public function showFeaturedVideosPage()
    {
        $featured_videos = FeaturedVideo::all();
        foreach ($featured_videos as $video) {
            $video->getFirstMediaUrl('video-images');
        }
        return Inertia::render('FeaturedVideos', ['featured_videos' => $featured_videos]);
    }

    // show featured video edit page
    public function showFeaturedVideosEditPage(Request $request, $id)
    {
        $featured_video = FeaturedVideo::findOrFail($id);
        $featured_video->getFirstMediaUrl('video-images');
        $featured_videos = FeaturedVideo::all();
        foreach ($featured_videos as $video) {
            $video->getFirstMediaUrl('video-images');
        }
        return Inertia::render('FeaturedVideos', ['featured_videos' => $featured_videos, 'featured_video' => $featured_video]);
    }

    // show artists page
    public function showArtistsPage(Request $request)
    {
        $artists = Artist::query()
            ->when($request->input('search'), function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(8)
            ->withQueryString();


        foreach ($artists as $artist) {
            $artist->getFirstMediaUrl('artist-images');
            $artist['created_at_hm'] = $artist->created_at->diffForHumans();
        }

        return Inertia::render('Artists', [
            'artists' => $artists,
            'filters' => $request->only(['search']),
        ]);
    }

    // show create artist page
    public function viewCreateArtistPage()
    {
        return Inertia::render('CreateArtist');
    }

    // show edit artist page
    public function showEditArtistPage(Request $request, $id)
    {
        $artist = Artist::findOrFail($id);
        $artist['profile_image'] = null;
        $artist->getFirstMediaUrl('artist-images');
        return Inertia::render('EditArtist', ['artist' => $artist]);
    }

    // update the header image
    public function storeHeaderImage(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|dimensions:width=440,height=620|max:800kb'
        ]);
        $image = PageImage::firstOrCreate([
            'name' => 'header.image'
        ]);
        $image->addMedia($request->file('file'))->toMediaCollection('page-images');
        return redirect(route('images'));
    }

    // update the secondary image
    public function storeSecondaryImage(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png|dimensions:width=440,height=620|max:800kb'
        ]);
        $image = PageImage::firstOrCreate([
            'name' => 'secondary.image'
        ]);
        $image->addMedia($request->file('file'))->toMediaCollection('page-images');
        return redirect(route('images'));
    }

    // store artist data
    public function storeArtist(Request $request)
    {
        $validated = $request->validate([
            'profile_image' => 'required|file|mimes:jpg,jpeg,png|dimensions:width=500,height=500|max:500kb',
            'name' => 'required|min:5',
            'description' => 'required|min:50',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'deezer' => 'nullable|url',
            'spotify' => 'nullable|url',
            'applemusic' => 'nullable|url',
            'amazonmusic' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $artist = Artist::create($validated);

        $artist->addMedia($request->file('profile_image'))->toMediaCollection('artist-images');
        return redirect(route('artists'));
    }

    // update artist data
    public function updateArtist(Request $request, $id)
    {
        $validated = $request->validate([
            'profile_image' => 'nullable|file|mimes:jpg,jpeg,png|dimensions:width=500,height=500|max:500kb',
            'name' => 'required|min:5',
            'description' => 'required|min:50',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'deezer' => 'nullable|url',
            'spotify' => 'nullable|url',
            'applemusic' => 'nullable|url',
            'amazonmusic' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $artist = Artist::findOrFail($id);

        $artist->fill($validated);

        $artist->save();

        if ($request->hasFile('profile_image')) {
            $artist->addMedia($request->file('profile_image'))->toMediaCollection('artist-images');
        }
        return redirect(route('artists'));
    }

    // delete artist
    public function destroyArtist(Request $request, $id)
    {
        Artist::findOrFail($id)->delete();
        return redirect(route('artists'));
    }

    // store featured video
    public function storeFeatuerdVideo(Request $request)
    {
        $validated  = $request->validate([
            'thumbnail' => 'required|file|mimes:jpg,jpeg,png|dimensions:width=1280,height=720|max:800kb',
            'youtube_url' => 'required|url',
        ]);

        $featured_video = FeaturedVideo::create($validated);
        $featured_video->addMedia($request->file('thumbnail'))->toMediaCollection('video-images');
        return redirect(route('featuredvideos'));
    }

    // update featured video
    public function updateFeatuerdVideo(Request $request, $id)
    {
        $featured_video = FeaturedVideo::findOrFail($id);
        $validated  = $request->validate([
            'thumbnail' => 'nullable|file|mimes:jpg,jpeg,png|dimensions:width=1280,height=720|max:800kb',
            'youtube_url' => 'required|url',
        ]);

        $featured_video->fill($validated);
        $featured_video->save();

        if ($request->hasFile('thumbnail')) {
            $featured_video->addMedia($request->file('thumbnail'))->toMediaCollection('video-images');
        }

        return redirect(route('featuredvideos'));
    }

    // delete featured video
    public function destroyFeaturedVideo(Request $request, $id)
    {
        FeaturedVideo::findOrFail($id)->delete();
        return redirect(route('featuredvideos'));
    }

    // register url generator page
    public function showRegisterUrlGenerator(Request $request)
    {
        $valid_mins = 60;
        $error = null;
        if ($request->input('t')) {
            $mins = trim($request->input('t'));
            if (is_numeric($mins)) {
                $valid_mins = abs(intval($mins));
            } else {
                $error = "Please enter a valid number";
            }
        }
        $temp_url = URL::temporarySignedRoute('client.signup', now()->addMinutes($valid_mins));
        return Inertia::render('RegisterUrl', ['mins' => $valid_mins, 'error' => $error, 'temp_url' => $temp_url]);
    }

    // change profile information
    public function changeProfileInformation(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        $user = $request->user();

        $user->fill($validated);
        $user->save();

        return redirect(route('profilesettings'))->with('success', 'Profile information updated successfuly.');
    }

    // change user password
    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', 'current_password:web'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::find($request->user()->id);

        $user->password = Hash::make($request->password);
        $user->save();

        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
