<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
  

    public function Destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function Message()
        {
            $messages = Message::all(); 
            return view('admin.pages.messages.index', compact('messages')); 
        }
    
}
