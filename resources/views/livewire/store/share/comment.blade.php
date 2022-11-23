<div>
    <h2 class="text-3xl mb-10" x-ref="reviews">Отзывы({{ $comments->total() }})</h2>
    <p class="mt-0.5 text-sm text-gray-500 mb-6">
        Все отзывы публикуются после проверки модератором. Мы не публикуем отзывы, не соответствующие правилам
        публикации пользовательского контента.
    </p>
    <div x-data="{ show: false }">
        @if( session('success') )
            <div
                x-init="show = false"
                class="p-4 mb-6 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                role="alert">
                {{ session('success') }}
            </div>
        @endif
        <button type="button"
                x-show="!show"
                x-on:click="show = true"
                class="mb-6 rounded-md border border-transparent px-6 py-3 text-base font-medium text-red-600 shadow-sm border-red-600">
            Оставить отзыв
        </button>
        <div x-loack x-show="show">
            <div class="mb-3">
                <input
                    class="border @error('name') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Имя" type="text" wire:model.lazy="name">
                @error('name')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @endif
            </div>
            <div class="mb-3">
                <input
                    class="border @error('email') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Почта" type="email" wire:model.lazy="email">
                @error('email')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @endif
            </div>
            <div class="mb-3">
                <textarea
                    class="border @error('text') border-red-500 @else border-gray-300 @endif text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Комментарий" wire:model.lazy="text"></textarea>
                @error('text')
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @endif
            </div>
            <div class="mt-6">
                <button type="button"
                        wire:click="add"
                        class="rounded-md border border-transparent px-6 py-3 text-base font-medium text-red-600 shadow-sm border-red-600">
                    Отправить
                </button>
            </div>
        </div>
    </div>

    @if( $comments->count() )
        <hr class="my-6">
    @endif

    @foreach( $comments as $comment )
        <div class="text-sm text-gray-600 grid grid-cols-5 mb-6">
            <div>
                <p><span class="font-medium">{{ $comment->name }}</span><br><span
                        class="text-xs">{{ $comment->created_at }}</span></p>
            </div>
            <div class="col-span-4"><p>{{ $comment->text }}</p></div>
        </div>
    @endforeach

    {{ $comments->links() }}

</div>
