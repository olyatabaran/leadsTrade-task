<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\MailInvitation;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class HomeController extends Controller
{
    public function balanceRefill()
    {
        $currentUser = auth('web')->user();

        return view('user.balanceRefill', [
            'user' => $currentUser,
        ]);
    }

    public function refillAction(Request $request)
    {
        $currentUser = auth('web')->user();
        $invitation = Invitation::with('user')->where('invitation_to', md5($currentUser->email))->first();

        if (!empty($invitation)) {
            $user = User::find($invitation->invited_by);
            if (!empty($invitation->invitation_to && $invitation->invitation_to == md5($currentUser->email))) {
                $currentUser->balance += $request->balance;
                $currentUser->save();
                $user->balance += $request->balance / 10;
                $user->save();
            }
        } else {
            $currentUser->balance += $request->balance;
            $currentUser->save();
        }
        return redirect(route('user.balanceRefill'));
    }

    public function invite()
    {
        return view('user.invite');
    }

    public function inviteAction(Request $request)
    {
        $user = auth('web')->user();
        $email = md5($request->email);

        Mail::to($request->email)->send(new MailInvitation($user, $email));
        Invitation::create([
            'invited_by' => $user->id,
            'invitation_to' => $email,
        ]);

        return redirect(route('user.invite'));
    }
}
