<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
class AuthController extends Controller
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
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'roles_id' => 'required|integer',
            'phone' => 'required|string',
            'address' => 'required|string',
            'Achievements' => 'required|string',
            'Job' => 'required|string',
            
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => $request->roles_id,
            'phone' => $request->phone,
            'address' => $request->address,
            'Achievements' => $request->Achievements,
            'Job' => $request->Job
          
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
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
    public function login(AuthRequest $request)
    {
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $user = User::where('email', '=', $request->email)->firstOrFail();
            $user->remember_token = $tokenResult->accessToken;
            $user->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
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
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    
    public function user(Request $request){
        
        $user = $request->user();
        $user->load('role');
        return response()->json($user);
    }


    
   
    public function getUserById($id){

        $user = User::find($id);
        return response()->json($user);
           
        }
    

    

//     public function users(Request $request){
//         $users = DB::table('users')->get();

// foreach ($users as $user)
// {
//     var_dump($user->name);
// }
//     }
    
}
