<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all(); 
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $input=$request->all();
        $input['password']=bcrypt($input['password']);

        $rules=[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ];

        $messages=[
            'name.required'=>'The name field is empty.',
            'email.required'=>'The email field is empty.',
            'password.required'=>'The password field is empty.'
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $user=User::create($input);
            return $user;
        } 
    }

    public function login(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            $token = $user->createToken('userToken')->accessToken;

            $respuesta=[];
            $respuesta['name']=$user->name;
            $respuesta['surnames']=$user->surnames;
            $respuesta['token']= $token;
            $respuesta['role']= $user->role;
            return response()->json($respuesta,200);
        }else{
            return response()->json(['error'=>'Not authenticated.'],401);
        }
    }

    public function logout(Request $request){
        $token = $request->user()->token();
        $token ->revoke();

        return response()->json('See you soon!',200);
    }

    public function getInfo(Request $request)
    {
        $user = Auth::user();
        return $user;
    }
    
    public function destroyUser(User $user) 
    {
        $user = Auth::user();
        try {
            $user->delete();
            return response() -> json('Account succesfully deleted.', 200);
        } catch (\Throwable $th) {
            return response()->json('There was an error trying to delete account.', 500);
        }
    }
}
