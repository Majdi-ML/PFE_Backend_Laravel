<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LdapRecord\Container;
use LdapRecord\Models\OpenLDAP\User as LdapUser;
use LdapRecord\Auth\BindException;

class LdapAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $username = $request->username;
        $password = $request->password;

        try {
            // Get the connection from the container using your config name
            $connection = Container::getConnection('ldap_ooredoo');
            
            $dn = "uid=$username," . env('LDAP_BASE_DN');

            if ($connection->auth()->attempt($dn, $password)) {
                // Use the configured connection name instead of the connection object
                $ldapUser = LdapUser::on('ldap_ooredoo')->find($dn);

                if (!$ldapUser) {
                    return response()->json(['message' => 'LDAP user not found'], 404);
                }

                $groups = $ldapUser->getAttribute('ou') ?? [];
                $email = $ldapUser->getFirstAttribute('mail') ?? "$username@example.com";

                $roleId = $this->determineRoleId($groups);

                $user = User::firstOrCreate(
                    ['username' => $username],
                    [
                        'email' => $email,
                        'password' => bcrypt($password),
                        'role_id' => $roleId,
                        'support_id' => null,
                    ]
                );

                Auth::login($user);
                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'message' => 'Login successful',
                    'user' => [
                        'id' => $user->id,
                        'username' => $user->username,
                        'email' => $user->email,
                        'role_id' => $user->role_id,
                        'role' => $user->role->role,
                        'support_id' => $user->support_id,
                    ],
                    'token' => $token
                ]);
            }

            return response()->json(['message' => 'Invalid LDAP credentials'], 401);
        } catch (BindException $e) {
            return response()->json(['message' => 'LDAP bind failed', 'error' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            return response()->json(['message' => 'LDAP error', 'error' => $e->getMessage()], 500);
        }
    }

    // ... rest of your controller remains the same ...


    protected function determineRoleId(array $groups): int
    {
        if (in_array('scientists', $groups)) {
            return Role::ADMIN; // 2 pour scientists
        }

        if (in_array('mathematicians', $groups)) {
            return Role::DEMANDEUR; // 1 pour mathematicians
        }

        return Role::DEFAULT; // À définir dans ta classe Role
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        

        return response()->json(['message' => 'Successfully logged out']);
    }
}
