<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $usersPaginate = User::select('id', 'name', 'email', 'role', 'status', 'avatar')
        ->paginate(5);
        return view('backend.user.user-list', ['user_list' => $usersPaginate]);
    }
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }
    public function create()
    {
        return view('backend.user.user-add');
    }
    
    private function saveFile($file, $prefixName = '', $folder = 'public')
    {
        if ($file) {
            $fileName = $file->hashName();
            $fileName = isset($prefixName)
                ? $prefixName . '_' . $fileName
                : $fileName;
                return $file->storeAs($folder, $fileName);
        }
    }
    
    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatarName = $avatar->hashName();
            $avatarName = $request->username . '_' . $avatarName;
            $user->avatar = $avatar->storeAs('images/users',$avatarName);
        }else{
            $user->avatar = '';
        }
        $user->save();
        return redirect()->route('admin.users.list');
    }
 
    public function edit(User $user){
        return view('backend.user.user-add', ['user' => $user]);
    }
    public function update(Request $request, User $user) {
        $user->fill($request->all());
        if ($request->hasFile('avatar')) {
            $user->avatar = $this->saveFile(
                $request->avatar,
                $user->username,
                'images/users'
            );
        }
        $user->save();

        return redirect()->route('admin.users.list');
    }
}
