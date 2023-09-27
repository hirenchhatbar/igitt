<?php
namespace Hiren\ApiPlatform\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function index(): View
    {
        return view('api-platform::role.index', []);
    }
}