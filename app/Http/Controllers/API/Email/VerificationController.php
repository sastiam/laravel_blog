<?php

namespace App\Http\Controllers\API\Email;

use App\Http\Controllers\Controller;
use App\Http\Requests\Email\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    public function sendVerificationEmail(Request $request)
    {
        if($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already verified'
            ];
        }

        $request->user()->sendEmailVerificationNotification();

        return [
            'status' => 'verification-link-sent',
        ];
    }

    public function verify(EmailVerificationRequest $request)
    {


        if($request->user()->hasVerifiedEmail()) {
            return [
                'message' => 'Already verified'
            ];
        }

        if($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return [
            'message' => 'Email has been verified'
        ];
    }
}
