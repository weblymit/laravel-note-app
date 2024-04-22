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
		<main class="mx-auto max-w-6xl py-10">
			{{ $slot }}
		</main>
	</div>
</body>

</html>
