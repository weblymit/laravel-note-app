<x-layout title="Create a note">
	<form
		action="{{ route('note.store') }}"
		method="POST"
	>
		@csrf
		<div class="mb-4">
			<textarea
			 class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
			 cols="30"
			 id="note"
			 name="note"
			 placeholder="Enter your note here..."
			 rows="10"
			></textarea>
		</div>
		<div class="mx-auto max-w-lg space-x-5">
			<a
				class="btn border-none bg-teal-500 text-white hover:bg-teal-700"
				href="{{ route('note.index') }}"
			>Annuler</a>
			<button
				class="btn border-none bg-blue-500 text-white hover:bg-blue-700"
				type="submit"
			>Create</button>
		</div>
	</form>

</x-layout>
