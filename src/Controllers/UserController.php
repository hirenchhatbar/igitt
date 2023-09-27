<?php
namespace Hiren\ApiPlatform\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function all(): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}