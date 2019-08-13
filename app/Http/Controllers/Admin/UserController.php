<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('admin.pages.users.index', compact(
            'users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'nullable|unique:users',
        ]);

        $user = User::create($request->all());
        $user->uploadImage($request->file('image'));
        $user->savePassword($request->get('password'));

        return redirect()->route('users.index', [
            'list_id' => $request->get('list_id')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.pages.users.edit', compact(
            'user'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|unique:users',
        ]);

        $user = User::find($id);
        $user->update($request->all());
        $user->uploadImage($request->file('image'));

        return redirect()->route('users.index', [
            'list_id' => ($request->get('list_id') != null) ? $request->get('list_id') : 1
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->removeImage();
        $user->delete();

        return redirect()->route('users.index');
    }

    public function passwordChange(Request $request, $id)
    {
        if(Auth::user())
        {
            $request->validate([
                'oldPassword' => 'required',
                'newPassword' => 'required',
                'confPassword' => "required"
            ]);
            $user = User::findOrFail($id);
            if(Hash::check($request->get('oldPassword'), $user->password))
            {
                if($request->get('newPassword') == $request->get('confPassword'))
                {
                    $user->savePassword($request->get('newPassword'));

                    return redirect()->back()->with('password_success', 'Пароль успешно изменен.');
                }else
                {
                    return redirect()->back()->with('password_confirmation_error', 'Новый пароль не совпадает с подтверждением.');
                }
            }else
            {
                return redirect()->back()->with('password_error', 'Пароль не совпадает с существующим.');
            }
        }

        return redirect()->back();
    }
}
