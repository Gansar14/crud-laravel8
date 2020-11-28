<div class="">
    {{-- {{$updateStateId}} --}}
    @foreach ($posts as $post)
        <div class=" p-4 my-4 bg-white shadow-md ">
            <div>
                <span class="text-xl font-bold"> {{ $post->user->name}}</span>
                <span class="text-gray-700"> {{ $post->created_at->diffForHumans()}}</span>
                <button 
                    wire:click="showUpdateForm({{ $post-> id}})"
                    class=" px-4 py-2 bg-teal-600 text-white hover:bg-teal-400 rounded-md">EDIT
                </button>
                <button 
                    onclick="return confirm('Apakah Yakin?') || event.stopImmediatePropagation() "
                    wire:click="Delete({{ $post-> id}})"
                    class="px-4 py-2 bg-red-600 text-white hover:bg-red-400 rounded-md">Delete
                </button>
            </div>
            <div>
                @if ($updateStateId !== $post->id)
                    <span> {{$post->body}}</span>
                @endif

                @if ($updateStateId === $post->id)
                    <textarea
                        wire:model="body"
                        class="my-4 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" rows="3">
                    </textarea>
                    <button
                        wire:click="update({{$post->id}})"
                        class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-400 rounded-md">Save
                    </button>
                @endif
            </div>
        </div>
    @endforeach
</div>
