<div class=" items-left mt-8 mb-4 w-full bg-black p-4 rounded-lg">
    <div class="flex flex-wrap mx-0 mb-6">
        <p class="text-white font-extrabold">Comments</p>
        @forelse ($comments as $comment)
            <div class="w-full my-4 border border-1 rounded-lg p-4 {{($comment->user_id == $postAuthor) ? 'bg-blue-100' : 'bg-white' }}">
                <div class="flex flex-row">

                    <div class="bg-indigo-100 rounded-full text-indigo-500 h-12 w-12 lg:h-24 lg:w-24">
                        @if ($comment->user->picture ?? false)
                        <img src="{{ Storage::url($comment->user->picture) }}" alt="{{ $comment->user->name }} picture"
                        class="rounded-full h-12 lg:h-24">
                        @else
                        <div class="h-12 w-12 lg:h-24 lg:w-24 mx-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 lg:h-20 w-full mx-auto" viewBox="0 0 20 20"
                            fill="currentColor">
                                <path fill-rule="evenodd"
                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd" />
                            </svg>
                        </div>
                        @endif 
                    
                    </div>
                    <div class="w-10/12 pl-4">
                    
                        <p class="font-extrabold">{{ $comment->user->name }}
                            @if ($comment->user_id == $postAuthor)
                            <span class="border border-blue-600 rounded-full px-4 text-sm text-blue-600 py-0.5">
                                Author
                            </span>
                            @endif
                        </p>
                        <p class="text-xs">{{ $comment->created_at->diffForHumans() }}</p>
                        <p>{{ $comment->comment }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="w-full my-4 border border-1 rounded-lg p-4 bg-white">
                <p>No comment until now</p>
            </div>
            @endforelse
    </div>
</div>
