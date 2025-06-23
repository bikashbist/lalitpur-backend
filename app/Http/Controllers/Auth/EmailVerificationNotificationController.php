<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        throw new NotFoundHttpException();
        
        // Or if you prefer to redirect:
        // return redirect('/')->with('error', 'Email verification is disabled');
    }
}
// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;

// class EmailVerificationNotificationController extends Controller
// {
//     /**
//      * Send a new email verification notification.
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(route('dashboard', absolute: false));
//         }

//         $request->user()->sendEmailVerificationNotification();

//         return back()->with('status', 'verification-link-sent');
//     }
// }
