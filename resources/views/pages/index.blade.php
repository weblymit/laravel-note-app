<x-layout>
	<a
		class="rounded-md bg-blue-500 px-4 py-2 text-white"
		href="{{ route('note.create') }}"
	>New note</a>
	<div class="mt-6 grid grid-cols-3 gap-6">
		@forelse ($notes as $note)
			<div class="max-w-sm rounded-lg bg-yellow-400 p-10 shadow-xl">
				<div class="">
					{{ Str::words($note->note, 40) }}
				</div>
				<div class="mt-6 flex justify-center space-x-4">
					<a
						class="btn border-none bg-blue-500 text-white hover:bg-blue-700"
						href="{{ route('note.show', $note) }}"
					>View</a>
					<a
						class="btn border-none bg-blue-500 text-white hover:bg-blue-700"
						href="{{ route('note.edit', $note) }}"
					>Edit</a>
					<x-btn-delete
						id="{{ $note->id }}"
						route="note.destroy"
					/>
				</div>
			</div>
		@empty
			<p>No notes yet</p>
		@endforelse
	</div>
	<div class="py-10">
		{{ $notes->links() }}
	</div>
</x-layout>
