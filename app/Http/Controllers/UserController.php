<?php

namespace Musicshop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Musicshop\Http\Requests;
use Illuminate\Http\Response;
use Musicshop\Http\Controllers\Controller;
use Musicshop\Http\Requests\UserAvatarRequest;
use Musicshop\Http\Requests\UserUpdateAddressRequest;
use Musicshop\Http\Requests\UserUpdatePasswordRequest;
use Musicshop\Http\Requests\UserUpdateRequest;
use Musicshop\User;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|UserUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
        ]);

        return redirect("/user/edit/{$user->id}")->withSuccess("Your Changes has been saved.");
    }

    /**
     * @param UserAvatarRequest $request
     * @param $id
     * @return mixed
     */
    public function uploadUserAvatar(UserAvatarRequest $request, $id) {

        $user = User::findOrFail($id);
        if($request->hasFile('file_name')){
            $file = $request->file('file_name');
            $fileName = $user->id . '-image.jpg';
            if($file){
                Storage::disk('local')->put($fileName, File::get($file));
            }
            $user->update([
                'avatar' => $user->id . '-image.jpg',
            ]);

            return redirect("/user/edit/{$user->id}")->withSuccess("Your Changes has been saved.");
        }
        return redirect("/user/edit/{$user->id}")->withErrors('There were some problems');;
    }

    /**
     * @param $filename
     * @return Response
     */
    public function getUserAvatar($filename){
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getAddress($id) {
        $user = User::findOrFail($id);
        return view('user.address', compact('user'));
    }

    /**
     * @param UserUpdateAddressRequest $request
     * @param $id
     * @return string
     */
    public function updateAddress(UserUpdateAddressRequest $request, $id) {
        $user = User::findOrFail($id);
        $user->update([
            'address' => $request->get('address'),
        ]);
        return redirect("/user/address/{$user->id}")->withSuccess("Your address has been changed.");
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserOrders($id) {
        $user = User::findOrFail($id);

        $orders = DB::table('orders')
            ->where('orders.user_id', '=', $user->id)
            ->get();

        return view('user.orders', compact('orders'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPassword($id) {
        $user = User::findOrFail($id);
        return view('user.password', compact('user'));
    }

    /**
     * @param UserUpdatePasswordRequest $request
     * @param $id
     * @return mixed
     */
    public function updatePassword(UserUpdatePasswordRequest $request, $id) {
        $user = User::findOrFail($id);
        $currentPassword = $request->get('current_password');
        if(Hash::check($currentPassword, $user->password)){
            $user->update([
                'password' => bcrypt($request->get('password')),
            ]);
            return redirect("/user/password/{$user->id}")->withSuccess("Your password has been changed.");
        } else {
            return redirect("/user/password/{$user->id}")->withErrors("Please enter correct password");
        }
    }
}
