<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="antialiased bg-gray-100 p-4 md:p-0 flex items-center justify-center h-screen">
<div class="max-w-sm w-full bg-white rounded-lg shadow-md p-6">
    <img src="{{ asset('images/logo-indigital-80.png') }}" alt="Logo" class="mx-auto mb-5 d-block">
    <form method="POST" action="/prospect"  hx-post="/prospect" hx-swap="outerHTML">
    <!-- Rest of your form code -->
    @csrf
    <div class="relative mb-5">
        <label for="name" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Name</label>
        <input id="name" type="text" name="name" placeholder="Name" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
    </div>
    <div class="relative mb-5">
        <label for="phone" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Phone</label>
        <input id="phone" type="text" name="phone" placeholder="Phone" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
    </div>
    <div class="relative mb-5">
        <label for="email" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Email</label>
        <input id="email" type="text" name="email" placeholder="Email" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
    </div>
        <div class="relative mb-5">
            <label for="state" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Location</label>
            <select id="state" name="state" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
                <option value="" disabled selected>Select your location</option>
                @foreach (\App\Enums\State::cases() as $state)
                    <option value="{{ $state->value }}">{{ ucfirst($state->value) }}</option>
                @endforeach
            </select>
        </div>
    <div class="relative mb-5">
        <label for="brand_name" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Brand Name</label>
        <input id="brand_name" type="text" name="brand_name" placeholder="Brand Name" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
    </div>
    <div class="relative mb-5">
        <label for="business_type" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Business Type</label>
        <select id="business_type" name="business_type" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
            <option value="" disabled selected>Select your business type</option>
            @foreach (\App\Enums\Business::cases() as $business)
                <option value="{{ $business->value }}">{{ ucfirst($business->value) }}</option>
            @endforeach
        </select>
    </div>
    <div class="relative mb-5">
    <label for="role" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Role</label>
    <select id="role" name="role" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
        <option value="" disabled selected>Select your role</option>
        @foreach (\App\Enums\Role::cases() as $role)
            <option value="{{ $role->value }}">{{ ucfirst($role->value) }}</option>
        @endforeach
    </select>
</div>
<div class="relative mb-5">
    <label for="last_30days_sales" class="input-label hidden absolute top-0 left-3 -mt-1 bg-white px-1 text-gray-700 text-sm font-bold">Last 30 Days Sales</label>
    <select id="last_30days_sales" name="last_30days_sales" class="appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:outline-none focus:border-black">
        <option value="" disabled selected>Select your last 30 days sale</option>
        @foreach (\App\Enums\Sale::cases() as $sale)
            <option value="{{ $sale->value }}">{{ ucfirst($sale->value) }}</option>
        @endforeach
    </select>
</div>
<button type="submit" class="w-full btn-green text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline">WHATSAPP SEKARANG</button></form>
{{--    <div class="relative mt-3 text-center text-10px">--}}
{{--        <p>Dengan menekan butang ini, saya bersetuju dengan</p>--}}
{{--        <p>Term of Use dan Privacy Policy oleh pihak Indigital</p>--}}
{{--    </div>--}}
</div>
   <script>
    const labels = document.querySelectorAll('.input-label');
    const inputs = document.querySelectorAll('input');
    const selects = document.querySelectorAll('select');

    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            const id = input.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);
            label.classList.remove('hidden'); // Remove the 'hidden' class
            label.classList.add('small');
            // Add 'input-focus' class
            input.classList.add('input-focus');
        });

        input.addEventListener('blur', () => {
            const id = input.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);
            if (input.value === '') {
                label.classList.add('hidden', 'input-empty');
                label.classList.remove('small');
                input.classList.add('input-empty');
            } else {
                label.classList.remove('input-empty', 'hidden'); // Remove the 'hidden' class
                input.classList.remove('input-empty');
            }
            // Remove 'input-focus' class
            input.classList.remove('input-focus');
        });
    });

    selects.forEach(select => {
        select.addEventListener('focus', () => {
            const id = select.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);
            label.classList.remove('hidden'); // Remove the 'hidden' class
            label.classList.add('small');
            // Add 'input-focus' class
            select.classList.add('input-focus');
        });

        select.addEventListener('blur', () => {
            const id = select.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);
            if (select.value === '') {
                label.classList.add('hidden', 'input-empty');
                label.classList.remove('small');
                select.classList.add('input-empty');
            } else {
                label.classList.remove('input-empty', 'hidden'); // Remove the 'hidden' class
                select.classList.remove('input-empty');
            }
            // Remove 'input-focus' class
            select.classList.remove('input-focus');
        });
    });

    document.querySelector('form').addEventListener('submit', function(event) {
        // Prevent the default form submission event
        event.preventDefault();

        // Get all input fields
        const inputs = document.querySelectorAll('input');

        // Get all select fields
        const selects = document.querySelectorAll('select');

        // Flag to check if the form is valid
        let isValid = true;

        // Iterate over each input field
        inputs.forEach(input => {
            const id = input.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);

            // If the label exists
            if (label) {
                // If the input field is empty
                if (input.value === '') {
                    // Add 'input-empty' class
                    label.classList.add('input-empty');
                    input.classList.add('input-empty');

                    // Set the form as invalid
                    isValid = false;
                } else {
                    // Remove 'input-empty' class
                    label.classList.remove('input-empty');
                    input.classList.remove('input-empty');
                }
            }
        });

        // Iterate over each select field
        selects.forEach(select => {
            const id = select.getAttribute('id');
            const label = document.querySelector(`label[for=${id}]`);

            // If the label exists
            if (label) {
                // If the select field is empty
                if (select.value === '') {
                    // Add 'input-empty' class
                    label.classList.add('input-empty');
                    select.classList.add('input-empty');

                    // Set the form as invalid
                    isValid = false;
                } else {
                    // Remove 'input-empty' class
                    label.classList.remove('input-empty');
                    select.classList.remove('input-empty');
                }
            }
        });

        // If the form is valid, submit it
        if (isValid) {
            this.submit();
        }
    });
</script>
</body>
</html>
