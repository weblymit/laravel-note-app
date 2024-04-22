@php
	$title = $title ?? 'Notes'; // Default title
	$styleLink = 'text-blue-500 hover:text-blue-700'; // Default style
@endphp
<!DOCTYPE html>
<html
	data-theme="emerald"
	lang="fr"
>

<head>
	<meta charset="UTF-8">
	<meta
		content="width=device-width, initial-scale=1.0"
		name="viewport"
	>
	<meta
		content="ie=edge"
		http-equiv="X-UA-Compatible"
	>
	<title>Document</title>
	@vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body>
	<div class="mx-auto min-h-screen max-w-6xl py-20">
		{{-- <x-navbar /> --}}
		<div
			class="flex items-center space-x-5 font-semibold uppercase"
			id="navitem"
		>
			@guest
				<a
					class="{{ $styleLink }}"
					href="{{ route('login') }}"
				>Connexion</a>
				<a
					class="{{ $styleLink }}"
					href="{{ route('register') }}"
				>Inscription</a>
			@endguest
			@auth
				<div class="flex w-full justify-end">
					<div class="flex items-center space-x-3">
						<span class="rounded-lg bg-yellow-300 px-3 py-2 text-xl">User: {{ Auth::user()->name }}</span>
						<x-btn-logout />
					</div>
				</div>
			@endauth
		</div>
		<main class="">
			@session('message')
				<div class="mb-6 rounded-lg bg-green-500 p-4 text-white">
					{{ session('message') }}
				</div>
			@endsession

			<x-header>{{ $title }}</x-header>
			{{ $slot }}
		</main>
	</div>
</body>

</html>
