<?php

namespace App\Actions\Fortify;

use App\Models\activityLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Storage;


class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'usuario' => ['required', 'string', 'max:255'],            
            'ci' => ['required'],
            'addres' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

           

        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
            Storage::put('public/profile-photos', $input['photo']);

        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }

        $dt = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        $user = auth()->user();
        $roleName = auth()->user()->roles->first()->name;        
        $activityLogs= activityLogs::create([            
        'name' => $user->usuario,
        'rol' => $roleName,            
        'descripcion' => 'Edito su Perfil',                        
        'data_time' => $todayDate,            
    ]);
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
