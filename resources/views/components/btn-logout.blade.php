<!-- Authentication -->
<form
	action="{{ route('logout') }}"
	method="POST"
>
	@csrf
	<button
		class=""
		type="submit"
	>Déconnexion</button>
</form>
