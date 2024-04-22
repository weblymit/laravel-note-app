<x-layout title="Edit note">
	<form
		action="{{ route('note.update', $note) }}"
		method="POST"
	>
		@csrf
		@method('PUT')
		<div class="mb-4">
			<label
				class="mb-2 block text-sm font-bold text-gray-700"
				for="note"
			>Note</label>
			<textarea
			 class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none"
			 cols="30"
			 id="note"
			 name="note"
			 rows="10"
			>{{ $note->note }}</textarea>
		</div>
		<button
			class="btn border-none bg-blue-500 text-white hover:bg-blue-700"
			type="submit"
		>Update</button>
	</form>

</x-layout>
