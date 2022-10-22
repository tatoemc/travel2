<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DB;
use Hash;
use Image;

class UserController extends Controller
{
   
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('users.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    
    public function create()
    {
        return view('users.create');
    }

   
    public function store(StoreUserRequest $request)
    {
       //dd($request->all());
        try {
            $validated = $request->validated(); 

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'phone' => $request->phone,
                'add' => $request->add,
                'user_type' => $request->user_type,
                'passport' => $request->passport
            ]);
    
                session()->flash('add_user');
                return redirect('/users');
               }
    
            catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
             }

    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $user = User::find($id);
       return view('users.edit',compact('user'));
    }

   
    public function update(Request $request, $id)
    {
        
            $input = $request->all();
           
            $user = User::find($id);
            $user->update($input);
            
            return redirect()->route('users.index')
            ->with('success','تم تحديث معلومات المستخدم بنجاح');
    }

   
    public function destroy(Request $request)
    {
       
        $user_id = $request->user_id;
        $user = User::where('id', $user_id)->first();
        $user->delete();

        session()->flash('delete_user');
        return redirect('/users');
    }
}
