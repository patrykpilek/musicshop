<?php

namespace Musicshop\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Musicshop\Http\Requests;
use Musicshop\Http\Controllers\Controller;
use Musicshop\Http\Requests\UserCreateAdminRequest;
use Musicshop\Http\Requests\UserUpdateAdminRequest;
use Musicshop\User;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request|TagCreateRequest|UserCreateAdminRequest $request
     * @return Response
     */
    public function store(UserCreateAdminRequest $request)
    {
        $user = new User(array(
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'password' => bcrypt($request->get('password')),
        ));
        $user->save();
        return redirect('/admin/users')->withSuccess("New User '$user->username' has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request|TagUpdateRequest|UserUpdateAdminRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(UserUpdateAdminRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'password' => bcrypt($request->get('password')),
        ]);

        return redirect("/admin/users/{$user->id}/edit")->withSuccess("Your changes has been saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(Storage::disk('local')->has($user->id . '-image.jpg')){
            Storage::disk('local')->delete($user->id . '-image.jpg');
        }
        $user->delete();
        return redirect('/admin/users')->withSuccess("User '$user->username' has been deleted.");
    }

}
