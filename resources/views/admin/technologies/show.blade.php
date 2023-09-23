<x-app-layout>

@section('contents')
<h2 class="dark:text-gray-100 mt-4 mb-4 text-2xl font-semibold leadi">{{ $technology->name }}</h2>

    <div class="dark:text-gray-100 flex flex-col justify-center items-center">
        <table class="w-100 mt-2 w-full p-6 text-xs text-left whitespace-nowrap">
            <colgroup>
                <col class="w-5">
                <col>
                <col class="w-5">
            </colgroup>
            <thead>
                <tr class="dark:bg-gray-700">
                    <th class="p-2">Name</th>
                    <th class="p-2">Description</th>
                    <th class="p-2">Actions</th>
                    
                </tr>
            </thead>
            <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                
                <tr>
                    <td class="px-2 text-1xl font-medium dark:text-gray-400">
                        {{ $technology->name }}
                    </td>
                    <td class="px-2 py-2 whitespace-normal">
                        <p>{{ $technology->description }}</p>
                    </td>
                    <td class="mt-2.5 mb-2.5 flex items-center justify-center">

                        <button class="ml-1 px-2 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white">
                            <a class="" href="{{ route('admin.technologies.edit', ['technology' => $technology->id]) }}">Edit</a>
                        </button>                        
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        <div class="mt-8 relative flex justify-center">
            <div class="group rounded-lg overflow-hidden">
                <img src="{{ Vite::asset('storage/app/public/' . $technology->image) }}" alt="" class="rounded-lg transition-transform transform scale-100 group-hover:scale-105 duration-300" style="width: 800px; height: 420px">
            </div>
        </div>
        <button class="my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white">
            <a class="button mx-1" href="{{ route('admin.technologies.index') }}">Return to list</a>
        </button>
    </div>
    
    

@endsection

</x-app-layout>