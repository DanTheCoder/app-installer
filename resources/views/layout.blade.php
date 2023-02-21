<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Application Installer</title>
</head>
<body class="bg-gray-50">

    <div class="flex min-h-full flex-col justify-center px-4 py-6">
        <div class="mt-6 mx-auto w-full sm:max-w-xl">
            
            <div class="text-center">
                @yield('header')
            </div>
              
            @if($errors->any())
                <div class="p-4 mt-5 text-sm rounded-md bg-yellow-50 text-yellow-700" role="alert">
                    {{$errors->first()}}
                </div>
            @endif
    
            <div class="mt-6 bg-white py-4 px-6 rounded-md border">
                @yield('content')
            </div>

        </div>
    </div>

</body>
</html>