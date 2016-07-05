<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = User::count();
        return view('signup', compact('counts'));
    }

     public function list()
    {
        $users = User::all();
        return view('list', compact('users'));
    }
    

    public function showInfo(PostRequest $request)
    {
        $result = $request->all();
        $photo = $request->file('photo');
        $destinationPath = public_path() . '/photos';
        $extension = $photo->getClientOriginalExtension();
        $filename = $result['name']. '.' . $extension;
        $photo->move($destinationPath, $filename);
        $result = array_merge($request->all(), ['photo'=>'/photos/'.$filename]);
        Cache::add($result['name'], $result, 5);
        return view('preview', compact('result', $result));

    }

    public function post()
    {
        $user = new User;
        if(!isset($_GET['name'])) {
            return '出差错了';
        } 
        $name = $_GET['name'];
        $result = Cache::get($name);
        if ( $user->create([
            'name' => $result['name'],
            'unit' => $result['unit'],
            'address' => $result['address'],
            'mobile' => $result['mobile'],
            'photo' => $result['photo'],
        ])
            ) {           
            return view('home')->with('name', $result['name']);
        }
    }
}
