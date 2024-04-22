<x-layout title="Note">
	<div class="mb-6 flex justify-end space-x-4">
		<a
			class="btn border-none bg-blue-500 text-white hover:bg-blue-700"
			href="{{ route('note.edit', $note) }}"
		>Edit</a>
		<x-btn-delete
			id="{{ $note->id }}"
			route="note.destroy"
		/>
	</div>
	<div class="max-w-6x mx-auto rounded-lg bg-yellow-400 p-10 shadow-xl">
		<span class="rounded-lg bg-white px-3 py-2">{{ $note->created_at }}</span>
		<div class="mt-5">
			{{ $note->note }}
		</div>

	</div>
</x-layout>
