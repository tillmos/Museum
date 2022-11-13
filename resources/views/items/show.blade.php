<x-guest-layout>
<div class="container mx-auto p-3 overflow-hidden min-h-screen">
    <div class="mb-5">
        <h1 class="font-semibold text-3xl mb-4">Item details</h1>

        <a href="/" class="text-blue-400 hover:text-blue-600 hover:underline"><i class="fas fa-long-arrow-alt-left"></i> Vissza a bejegyzésekhez</a>
        <div class="col-span-3 lg:col-span-1">
            <img src="{{$item->image}}">
            <div class="px-2.5 py-2 border-r border-l border-b border-gray-400 ">
                <h3 class="text-xl mb-0.5 font-semibold">
                    {{$item -> name}}
                </h3>
                
                <p class="text-gray-600 mt-1">
                   {!!str_replace('\n', '<br>',$item -> description)!!}
                </p>
                
            </div>
            <form method="POST" action="{{route('items.destroy', $item)}}" id="delete-form">
                @csrf
                @method('DELETE')
            <a href="{{route('items.destroy', $item)}}" 
            onClick="event.preventDefault(); document.querySelector('#delete-form').submit();"
            class="bg-red-500  px-2 py-1 text-white"><i
                class="fas fa-trash"></i>Delete</a>
            </form>
        <div>
            @empty($comments)
                <div>There are no comments on this item.</div>
            @endempty
        </div>
            @foreach ($comments as $comment)
            @if($comment->item_id == $item->id)
        <div>
            COMMENT: {{$comment->id}}
        </div>
        @endif
            @endforeach
           
        </div>
    
    </div>
</x-guest-layout>
   