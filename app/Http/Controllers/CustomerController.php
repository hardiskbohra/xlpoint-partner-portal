<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Traits\FileUploadTrait;

class CustomerController extends Controller
{
    use FileUploadTrait;
    
    public function index()
    {
        try {
            // Retrieve all users with the role_id of 3 (customers)
            $customers = User::where('role_id', 3)->get();
    
            // Check if customers were found
            if ($customers->isEmpty()) {
                // Handle case where no customers are found
                return view('customers.list')->with('customers');
            }
    
            // Return the view with the customers data
            return view('customers.list', compact('customers'));

        } catch (\Exception $e) {
            // Handle any exceptions or errors during database retrieval
            return view('customers.list')->withErrors('An error occurred while retrieving customers.');
        }
    }
    
    public function store(Request $request)
    {
        $data =  [
                'name' => $request->first_name ." ".$request->last_name,
                'role_id' => Role::where('name','like','%partner%')->first()->id,
                'email' => $request->email,
                'password' => Hash::make('$request->email'),
                'avatar' => $request->avatar
            ];
        $user = User::create($data);
        
        if ($request->hasfile('avatar')) {
            $this->fileUpload($request,$user, 'avatar'); // For User model and avatar field
        }

        return true;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = \App\Models\Role::select('id','name')->get();
        return view('user.edit',compact(['user','roles']));
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
    public function update(Request $request, User $user)
    {
        // $user->update($request->only('name','email','role_id'));

        return redirect()->route('partners.index')
                        ->with('success','User updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\User  $user
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
        // $user->delete();

        return redirect()->route('partners.index')
                        ->with('success','User deleted successfully');
    }

}
// https://www.itsolutionstuff.com/post/laravel-8-crud-application-tutorial-for-beginnersexample.html
