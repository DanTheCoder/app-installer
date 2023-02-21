<?php

namespace DanTheCoder\AppInstaller\Http\Controllers;

use App\Http\Controllers\Controller;
use DanTheCoder\AppInstaller\AppInstaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ConfigurationController extends Controller
{
    public function index()
    {
        return view('app-installer::configuration');
    }

    public function store(Request $request)
    {
        // Verify that we can connect to the database
        try {
            mysqli_connect($request->db_host, $request->db_username, $request->db_password, $request->db_name);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()])->withInput();
        }

        // Update the .env file
        AppInstaller::setEnvVariable('APP_NAME', $request->app_name);
        AppInstaller::setEnvVariable('APP_URL', url('/'));
        AppInstaller::setEnvVariable('APP_ENV', 'production');
        AppInstaller::setEnvVariable('APP_DEBUG', 'false');
        AppInstaller::setEnvVariable('DB_HOST', $request->db_host);
        AppInstaller::setEnvVariable('DB_PORT', $request->db_port);
        AppInstaller::setEnvVariable('DB_DATABASE', $request->db_name);
        AppInstaller::setEnvVariable('DB_USERNAME', $request->db_username);
        AppInstaller::setEnvVariable('DB_PASSWORD', isset($request->db_password) ? $request->db_password : '');

        // Run artisan commands
        Artisan::call('key:generate', [
            '--force' => true,
        ]);
        Artisan::call('storage:link', [
            '--force' => true,
        ]);

        return redirect(route('app-installer::create-user.index'));
    }
}
