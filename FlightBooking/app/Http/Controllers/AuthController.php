<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; // Import the Redirect facade
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;

class AuthController extends Controller
{
    public $auth0;

    public function __construct()
    {
        $configuration = new SdkConfiguration(
            domain: 'user-authorization.au.auth0.com',
            clientId: 'zU7qoSEWqPdpibOKL6fQz1LumyQfMhXZ',
            clientSecret: 'qgrXbnU3xPidLa_iJa2HrTHVCqdVBbVMOwBTrrn0ZDFf_YD5BBkRryP4WeoCKW6_',
            cookieSecret: 'Your generated string',
            redirectUri: 'http://localhost:8000/callback',
        );
        $this->auth0 = new Auth0($configuration);
    }

    public function auth()
    {
        if ($this->auth0 === null) {
            abort(500, 'Auth0 instance is not initialized.');
        }

        $session = $this->auth0->getCredentials();

        if (null === $session || $session->accessTokenExpired) {
            return redirect($this->auth0->login()); // Ensure this method returns the correct URL
        }

        // Redirect to the intended page or home page if authenticated
        return redirect()->intended();
    }


    public function callback(Request $request)
    {
        $input = $request->all();
        if (null !== $this->auth0->getExchangeParameters()) {
            $this->auth0->exchange();
        }

        $user = $this->auth0->getCredentials()?->user;
        dd($user);
    }

    public function logout()
    {
        // Log out from the local application (if needed)
        Auth::logout();

        // Build the logout URL
        $logoutUrl = 'https://user-authorization.au.auth0.com/v2/logout?' .
            'federated&client_id=zU7qoSEWqPdpibOKL6fQz1LumyQfMhXZ&returnTo=' .
            urlencode('http://localhost:8000');

        // Redirect to the Auth0 logout URL
        return Redirect::to($logoutUrl);
    }
}
