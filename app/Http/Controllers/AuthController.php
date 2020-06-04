<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
class AuthController extends Controller // this controller is self created controller for writing api function of users
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request) // this function creates new user to the system
    {

        $request->validate([ // checks form validity while creating new user
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'roles_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'Achievements' => 'required|string',
            'Job' => 'required|string',
        ]);
        $user = new User([ // crate new user and save in database. 
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => $request->roles_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'Achievements' => $request->Achievements,
            'Job' => $request->Job,
        ]);
        $user->save();
        return response()->json( // shows sucess message after creating user
            'Successfully created user!'
        , 201);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(AuthRequest $request) // this function will log in user to the system
    {
        $credentials = request(['email', 'password']); // asks for email and password and check validity
        if(!Auth::attempt($credentials))
            return response()->json(
                'Invalid Username or Password'
            , 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token'); // creates token after user logs in 
        $token = $tokenResult->token;

        if ($request->remember_me) // checks remeber me option
            $token->expires_at = Carbon::now()->addWeeks(1);
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $user->remember_token = $tokenResult->accessToken;
            $user->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken, // return response as token after user logs in
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);


    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request) // this function log out user from the system and deletes token
    {
        $token = $request->user()->token();
        $token->revoke();

        $response = 'You have been succesfully logged out!';
        return response($response, 200);

    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */

    public function user(Request $request){ // this function will show details of logged in users

        $user = $request->user();
        $user->load('role');
        return response()->json($user);
    }

    public function users(Request $request ){ // this function shows all registered user in app

        $search = $request->header('search');
        $search = $search ."%";
        if($search){
            return User::where("name","like",$search)->with('role')->get();
        }
        return User::with('role')->get();
    }




    public function getUserById($id){ // this functon shows user by id

        $user = User::find($id);
        return response()->json($user);

        }

    public function updatebyid(Request $request, $id) // this function is created to update the data of user
        {

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->password);
            $user->roles_id = $request->input('roles_id');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->Achievements = $request->input('Achievements');
            $user->Job = $request->input('Job');


            $user->save(); // saves updated data to database
            return response()->json($user); // returns updated data



        }






}
