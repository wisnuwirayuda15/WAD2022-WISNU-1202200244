<?php

namespace App\Http\Controllers;

use App\Models\Showroom;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.profile-wisnu', [
            'title' => 'Profile',
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        if (empty($request->password)) {
            $userData = $request->validate(
                [
                    'name' => ['min:3', 'max:255'],
                    'no_hp' => ['numeric'],
                ],
            );
        } else {
            $userData = $request->validate(
                [
                    'name' => ['min:3', 'max:255'],
                    'no_hp' => ['numeric'],
                    'password' => ['min:8', 'same:conf_pass'],
                ],
            );



            $userData['password'] = bcrypt($userData['password']);
        }

        User::where('id', $user_id)->update($userData);

        return redirect('/profile')
            ->with('toast', 'Akun berhasil diupdate.')
            ->with('color', 'text-warning');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        User::find()->delete();

        //Hapus semua showroom mobil untuk akun ini
        Showroom::where('user_id', $user_id)->delete();

        return redirect('/logout')
            ->with('toast', 'Akun berhasil dihapus.')
            ->with('color', 'text-danger');
    }
}
