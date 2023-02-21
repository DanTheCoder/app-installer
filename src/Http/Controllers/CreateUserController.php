<?php

namespace DanTheCoder\AppInstaller\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DanTheCoder\AppInstaller\AppInstaller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class CreateUserController extends Controller
{
    public function index()
    {
        return view('app-installer::create-user');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return redirect(route('app-installer::create-user.store'))->withErrors($validator)->withInput();
        }

        // Run the migration
        Artisan::call('migrate:fresh', [
            '--force' => true,
        ]);

        // Write to env
        AppInstaller::setEnvVariable('SYSTEM_NOTIFICATION_EMAIL', $request->email);
        AppInstaller::setEnvVariable('APP_INSTALLER_COMPLETED', 'true');

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        if (Schema::hasColumn('users', 'is_admin')) {
            $user->is_admin = true;
            $user->save();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(config('app-installer.admin_path'));
    }
}
