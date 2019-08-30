<?php

namespace App\Http\Controllers;

use App\Video;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Alert;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Request::ajax()){
            return response(Video::inRandomOrder()->paginate(100)->jsonSerialize(), Response::HTTP_OK);
        }
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
        $validator = $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'video' => 'required|mimes:mp4,mov,ogg',
        ]);

        try {
            $user = User::findOrFail(Auth::user()->id);
            $video =  new Video;
            $video->user_id = $user->id;
            $video->title = $request->title;
            $video->description = $request->description;
            $video->status = 'status';

            if ($request->file('image')) {
                $filename = Auth::user()->id . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path('/image'), $filename);
                $video->image = $filename;
            }

            if ($request->file('video')) {
                $filename = Auth::user()->id . '_' . time() . '.' . $request->file('video')->getClientOriginalExtension();
                $request->file('video')->move(public_path('/video'), $filename);
                $video->video_path = $filename;
            }

            $video->save();
            Alert::message('Robots are working!');
            return  redirect('home');
        } catch (\Throwable $th) {
            return redirect('home')
                ->withErrors($validator)
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (\Request::ajax()) {
            $video = Video::where('slug', $slug)->first();
            return response($video->jsonSerialize(), Response::HTTP_OK);
        }

        return response()
            ->view('video.show');
            // ->json(['slug' => $slug]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $video = Video::findOrFail($video->id);
        $video->update($request()->all());
        return Response::HTTP_OK;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video = Video::findOrFail($video->id);
        $video->delete();
        return Response::HTTP_OK;
    }
}
