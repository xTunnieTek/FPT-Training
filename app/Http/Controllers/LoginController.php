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
            // Check Users Email If Already There
            $is_user = User::where('email', $user->getEmail())->first();
            if(!$is_user){

                $saveUser = User::updateOrCreate([
                    'google_id' => $user->getId(),
                ],[
                    'google_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'avatar_original' => $user->getAvatar(),
                    'ip' => $ip,
                    'password' => Hash::make($user->getName().'@'.$user->getId()),
                    'email_verified_at' => now(),
                    // Lấy vị trí hiện tại
                    'address' => $location,
                    //'address'=> $user->user->getAddress() ?? '',
                    'role'=> '2',
                ]);
            }else{
                $saveUser = User::where('email',  $user->getEmail())->update([
                    'google_id' => $user->getId(),
                    'avatar_original' => $user->getAvatar(),
                    'address'=> Location::get($user->token),
                ]);
                $saveUser = User::where('email', $user->getEmail())->first();
            }


            Auth::loginUsingId($saveUser->id);

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {
            return redirect()->route('dashboard');
        }

        return redirect()->back();
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
