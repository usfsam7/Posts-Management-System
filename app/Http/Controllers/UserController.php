<?php

namespace App\Http\Controllers;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate();
        return view("users.index", compact("users"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_date =  $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email'=> ['required','email', 'unique:users,email,except,id'],
            'password' => ['required', 'string', 'min:5', 'max:50'],
            'confirm_password' => ['required', 'string', 'min:5', 'max:50', 'same:password'],
            'type' => ['required', 'in:admin,author']

        ]);

        $user = User::create($user_date);
        $user->save();

        return back()->with('success','User Add Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function posts(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.posts', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user_data =  $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:100'],
            'email'=> ['required','email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:5', 'max:50'],
            'confirm_password' => ['nullable', 'string', 'min:5', 'max:50', 'same:password'],
            'type' => ['required', 'in:admin,author']

        ]);

        $user_data['password'] = $request->has('password') ? bcrypt($request->password) :  $user->password;
        unset( $user_data['confirm_password'] );

       User::where('id', $id)->update($user_data);

       return redirect()->route('users.index')->with('success','User updated Successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success','User Deleted Successfully');
    }
}





