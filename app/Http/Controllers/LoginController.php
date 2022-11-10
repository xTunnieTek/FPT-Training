<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



class LoginController extends Controller
{

    protected $redirectAfterLogout = '/login';
    protected $redirectAfterLogin = '/dashboard';


    public function getLogin()
    {
        return view('login');
    }

    public function loginWithGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        try {
            $user = Socialite::driver('google')->user();
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'google_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'avatar_original' => $user->getAvatar(),
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'email_verified_at' => now(),
                ]);
                $email = $user->getEmail();
                $role = 'trainee';
                $specialized = '';
                if (strpos($email, 'BHA') !== false) {
                    $specialized = 'Information Technology';
                } elseif (strpos($email, 'BHB') !== false) {
                    $specialized = 'Business';
                } elseif (strpos($email, 'BHG') !== false) {
                    $specialized = 'Graphic Design';
                }
                $saveUser->specialized = $specialized;
                $saveUser->role = $role;
                $saveUser->save();
                Auth::login($saveUser);
                return redirect()->route('dashboard');


            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                    'avatar_original' => $user->getAvatar(),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }
            Auth::loginUsingId($saveUser->id);
            $success='Logged Successfully!';
            if(Auth::user()->role == 'admin' || Auth::user()->role == 'trainer' || Auth::user()->role == 'staff'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('learning');
            }

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $success='Logged Successfully!';
            if(Auth::user()->role == 'admin' || Auth::user()->role == 'trainer' || Auth::user()->role == 'staff'){
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('learning');
            }
        }else{
            $error='Email or Password is incorrect!';
            return redirect()->route('login')->with('error',$error);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    protected function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard';
    }


}
