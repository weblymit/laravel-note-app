<div class="bg-indigo-500 text-gray-100">
	<div class="flex justify-between px-20 py-7">
		<div class="">
			<a
				class="font-black uppercase"
				href="/"
			>Notes</a>
		</div>
		<div class="space-x-4">
			@guest
				<a href="{{ route('login') }}">Connexion</a>
				<a href="{{ route('register') }}">Inscription</a>
			@endguest
			@auth
				<div class="flex space-x-4">
					<a href="{{ route('dashboard') }}">Dashboard</a>
					<x-btn-logout />
				</div>
			@endauth
		</div>
	</div>
</div>
