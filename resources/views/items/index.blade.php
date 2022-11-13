<x-guest-layout>
    <x-slot name="title">
        Main page
    </x-slot>
<div class="container mx-auto p-3 lg:px-36">
    <div class="grid grid-cols-1 lg:grid-cols-2 mb-4">
        <div>
            <h1 class="font-bold my-4 text-4xl">Museum</h1>
        </div>
        @auth
       
        <div class="flex items-center gap-2 lg:justify-end">
            <a href="{{ route('labels.create')}}" class="bg-green-500 hover:bg-green-700 px-2 py-1 text-white"><i
                    class="fas fa-plus-circle"></i> New Label</a>
            <a href="" class="bg-green-500 hover:bg-green-700 px-2 py-1 text-white"><i
                    class="fas fa-plus-circle"></i> New Item</a>
        </div>
    
        @endauth
    </div>
<div>
    {{ $items->links() }}
</div>
    <div class="grid grid-cols-4 gap-6">
        <div class="col-span-4 lg:col-span-3">
            <h2 class="font-semibold text-3xl my-2">Items</h2>
            <div class="grid grid-cols-3 gap-3">
          
                @foreach ($items as $item)
                <div class="col-span-3 lg:col-span-1">
                    <img src="{{$item->image}}">
                    <div class="px-2.5 py-2 border-r border-l border-b border-gray-400 ">
                        <h3 class="text-xl mb-0.5 font-semibold">
                            {{$item -> name}}
                        </h3>
                        
                        <p class="text-gray-600 mt-1">
                           {{Str::limit($item -> description, 100)}}
                        </p>
                        <button onclick="window.location='{{route('items.show',$item)}}'"
                            class="bg-blue-500 hover:bg-blue-600 px-1.5 py-1 text-white mt-3 font-semibold">Details <i
                                class="fas fa-angle-right"></i></button>
                    </div>
                   
                </div>
                @endforeach
            </div>
            
        </div>
       
        <div class="col-span-4 lg:col-span-1">
            <h2 class="font-semibold text-3xl my-2">Menü</h2>
            <div class="grid grid-cols-1 gap-3">
                <div class="border px-2.5 py-2 border-gray-400">
                    <form>
                        <label for="name" class="block font-medium text-xl text-gray-700">Keresés</label>
                        <input type="text" name="name" id="name"
                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300"
                            placeholder="Bejegyzés címe">
                        <button type="submit"
                            class="mt-3 bg-blue-500 hover:bg-blue-600 text-gray-100 font-semibold px-2 py-1"><i
                                class="fas fa-search"></i> Keresés</button>
                    </form>
                </div>
                <div class="border px-2.5 py-2 border-gray-400">
                    <h3 class="mb-0.5 text-xl font-semibold">
                        Labels
                    </h3>
                    <div class="flex flex-row flex-wrap gap-1 mt-3">
                    @foreach ($labels as $label)

                    <a href="{{ route('labels.edit', $label)}}" class="py-0.5 px-1.5 font-semibold text-white text-sm" style="background-color:{{$label->color}}">{{$label->name}} </a>
                    @endforeach
                    
                    
                    </div>
                </div>
                <div class="border px-2.5 py-2 border-gray-400">
                    <h3 class="mb-0.5 text-xl font-semibold">
                        Statisztika
                    </h3>
                    <ul class="fa-ul">
                        <li><span class="fa-li"><i class="fas fa-user"></i></span>Felhasználók: {{$user_count}}</li>
                        <li><span class="fa-li"><i class="fas fa-file-alt"></i></span>Bejegyzések: {{$items->count()}}</li>
                        <li><span class="fa-li"><i class="fas fa-comments"></i></span>Hozzászólások: {{$comment_count}}</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
</x-guest-layout>