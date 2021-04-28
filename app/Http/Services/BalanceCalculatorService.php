<?php


namespace App\Http\Services;

use App\Models\Invitation;
use App\Models\User;

class BalanceCalculatorService
{
    public function calculateBalance($request, $currentUser)
    {
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
    }
}
