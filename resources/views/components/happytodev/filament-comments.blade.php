<div class="flex flex-col">

    <div class="mx-auto items-center shadow-lg justify-center mt-8 w-full rounded-lg">
        @livewire('filament-comments.post-comments', ['commentable_id' => $post->id])
    </div>
    
    @livewire('filament-comments.show-comments', ['commentable_id' => $post->id])
</div>
