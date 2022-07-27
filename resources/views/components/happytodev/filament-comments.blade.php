<div class="flex flex-col">

    <div class="mx-auto items-center shadow-lg justify-center mt-8 w-full">
        <form class="w-full bg-white rounded-lg px-4 pt-2 ">
            <div class="flex flex-wrap mx-0">
                <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                <div class="w-full md:w-full px-3 mb-2 mt-2">
                    <textarea
                        class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                        name="body" placeholder='Type Your Comment' required></textarea>
                </div>
                <div class="w-full md:w-full flex items-start md:w-full px-3">
                    <div class="-mr-1 mb-4">
                        <input type='submit'
                            class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                            value='Post Comment'>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class=" items-left mt-8 mb-4 w-full bg-black p-4 rounded-lg">
        <div class="flex flex-wrap mx-0 mb-6">
            <p class="text-white font-extrabold">Comments</p>
            @forelse ($post->comments as $comment)
                <div class="w-full my-4 border border-1 rounded-lg p-4 bg-white">
                    <p class="font-extrabold">{{ $comment->user->name }}</p>
                    <p class="text-xs">{{ $comment->created_at }}</p>
                    <p>{{ $comment->comment }}</p>
                </div>
            @empty
                <div class="w-full my-4 border border-1 rounded-lg p-4 bg-white">
                    <p>No comment until now</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
