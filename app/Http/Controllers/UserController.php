<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
       $users = User::with('role')->where(function($query) use($request){
           if(!empty($request->user_search))
           {
               $query->where('name','like',"%$request->user_search%");
           }
           if(!empty($request->role_search))
           {
               $query->where('role_id',$request->role_search);
           }
           if(!empty($request->status_search))
           {
               
               $query->where('status',$request->status_search == "active" ? 1 : 0);
           }
       })
       ->get();
       
        if ($request->ajax()) {
            return view('user.partial.list', compact('users'))->render();
        }
       return view('user.list', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.partial.edit_form', compact('user'))->render();
    }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('user.edit', compact('user'));
    // }
    // public function update($id)
    // {
    //     $user = User::findOrFail($id);
    //     $user->update($request->validated());
    // }
    
        public function update(UserRequest $request, $id)
        {
            $user = User::findOrFail($id);
            // Update the user with validated data
            $user->update($request->only('mobile_number', 'email', 'role_id') + ["name" => $request->first_name ." ".$request->last_name]);
        
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User updated successfully!'
                ]);
            }
        
            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        }


    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        // Check if the user's role_id is not 1
        if ($user->role_id !== 1) {
            
            $user->update(['status' => 0]);
    
            // Redirect with a success message
            return redirect()->route('users.index')
                            ->with('success', 'User deleted successfully');
        }
    
        // If role_id is 1, redirect with an error message
        return redirect()->route('users.index')
                        ->with('error', 'User with this role cannot be deleted');
    }
    
    public function store(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            $data =  [
                'name' => $request->first_name." ".$request->last_name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'mobile_number' => $request->mobile,
                'password' => Hash::make('$request->pass'),
                'status' => 1,
            ];
            $user = User::create($data);
    
            return redirect()->route('users.index')->with('success', 'User created successfully!');
        }

        return redirect()->route('users.index')->with('error', 'User with this username already exists!');
    }
    
    public function updateUserStatus($id, $status)
    {
        try
        {
            User::find($id)->update(["status" => $status]);
        }
        catch(\Exception $e)
        {
            return response()->json([
                    'success' => false,
                    'error' => $e->getMessage(),
                    'message' => 'User updation failed!'
                ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!'
        ]);
    }

}
// https://www.itsolutionstuff.com/post/laravel-8-crud-application-tutorial-for-beginnersexample.html
