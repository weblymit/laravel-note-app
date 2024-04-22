@php
	$title = $title ?? 'Notes'; // Default title
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
	<div class="min-h-screen">
		{{-- <x-navbar /> --}}
		<main class="mx-auto max-w-6xl py-20">
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
