<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = new User();
            $user->first_name = $request->firstName;
            $user->last_name = $request->lastName;
            $user->birth_date = $request->birthDate;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            if ($request->has('image')) {
                $file = $request->file('image');
                $fileName = time() . '.' . $request->image->extension();
                $path = 'uploads/users/';

                $publicPath = public_path($path);
                if (!is_dir($publicPath)) {
                    mkdir($publicPath, 0755, true);
                }
                $file->move($publicPath, $fileName);
                $user->image = $publicPath . $fileName;
            }
            $user->save();

            $token = $user->createToken('myapptoken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response()->json($response, 201);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $user = User::findOrFail($id);
            return new UserResource($user);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            if ($request->has('firstName')) {
            
                $user->first_name = $request->firstName;
            }
            if ($request->has('lastName')) {
                $user->last_name = $request->lastName;
            }
            if ($request->has('birthDate')) {
                $user->birth_date = $request->birthDate;
            }
            if ($request->has('phone')) {
                $user->phone = $request->phone;
            }
            if ($request->has('email')) {
                $user->email = $request->email;
            }
            if ($request->has('address')) {
                $user->address = $request->address;
            }
            if ($request->has('image')) {
                if (file_exists($user->image)) 
                {
                  unlink($user->image);
                  
               }
                $file = $request->file('image');
                $fileName = time() . '.' . $request->image->extension();
                $path = 'uploads/users/';
                $publicPath = public_path($path);
                if (!is_dir($publicPath)) {
                    mkdir($publicPath, 0755, true);
                }
                $file->move($publicPath, $fileName);
                $user->image = $publicPath . $fileName;
            }
            $user->save();
            $response = [
                'user' => $user,
                'message' => 'User updated successfully'
            ];
            return response()->json($response, 200);

        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return 'user deleted successfully';
    }
}
