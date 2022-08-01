<div>
    @if (auth()->check())
        {{-- @include('comments::livewire.partials.newComment') --}}
        <form class="w-full bg-white rounded-lg px-4 pt-2" wire:submit.prevent="save">
            <div class="flex flex-wrap mx-0">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                    wire:model.lazy="comment.comment"
                    class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                    name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start px-3">
                    <div class="-mr-1 mb-4">
                        <input type='submit'
                        class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                        value='Post Comment'>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="text-center p-4 rounded-xl bg-slate-100 shadow-lg">
            <a class="inline-flex items-center justify-center gap-0.5 font-medium hover:underline focus:outline-none focus:underline filament-link text-primary-600 hover:text-primary-500" href="{{ route('filament.auth.login') }}">
                Sign in to comment &rarr;
            </a>
        </div> 
    @endif
</div>