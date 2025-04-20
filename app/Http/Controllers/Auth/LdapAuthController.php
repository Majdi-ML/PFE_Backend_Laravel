<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use LdapRecord\Models\ActiveDirectory\User as LdapUser;
use LdapRecord\Laravel\Auth\BindFailedException;
use LdapRecord\Laravel\Facades\Ldap;

class LdapAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $username = $request->username;
        $password = $request->password;

        try {
            // Tentative de connexion au LDAP
            $connection = Ldap::connection();
            $dn = "uid={$username},dc=example,dc=com";

            if ($connection->auth()->attempt($dn, $password)) {

                // Vérifie si l'utilisateur existe localement
                $user = User::where('username', $username)->first();

                if (!$user) {
                    // Récupération des infos LDAP
                    $ldapUser = $connection->query()->where('uid', '=', $username)->first();

                    $group = $ldapUser->getFirstAttribute('ou'); // ex: mathematicians, scientists

                    $roleId = 3; // par défaut
                    if ($group == 'scientists') {
                        $roleId = 1;
                    } elseif ($group == 'mathematicians') {
                        $roleId = 2;
                    }

                    $user = User::create([
                        'username' => $username,
                        'email' => $username . '@example.com',
                        'password' => bcrypt($password), // facultatif si pas utilisé
                        'role_id' => $roleId,
                    ]);
                }

                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message' => 'Login successful',
                    'user' => $user,
                    'token' => $token
                ]);
            }

            return response()->json(['message' => 'Invalid LDAP credentials'], 401);
        } catch (BindFailedException $e) {
            return response()->json(['message' => 'LDAP bind failed', 'error' => $e->getMessage()], 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); // révoque tous les tokens
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
