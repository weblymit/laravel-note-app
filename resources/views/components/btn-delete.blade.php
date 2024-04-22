@props(['id', 'route'])
<div class="">
	<form
		action="{{ route($route, $id) }}"
		method="POST"
		onsubmit="return confirm('Etes-vous sur de vouloir supprimer ?')"
	>
		@csrf
		@method('DELETE')
		<button
			class="btn border-none bg-red-500 text-white hover:bg-red-700"
			type="submit"
		>Supprimer</button>
	</form>
</div>
