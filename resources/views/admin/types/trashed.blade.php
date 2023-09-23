<x-app-layout>
    @section('contents')

    {{-- ************************************************************* --}}

    @if (session('delete_success'))
        @php $type = session('delete_success') @endphp
        <div class="mt-2 bg-red-500 text-white py-2 px-4 rounded-lg">
            The Type "{{ $type->name }}" has been permanently deleted
        </div>
    @endif


    @if (session('restore_success'))
        @php $type = session('restore_success') @endphp
        <div class="mt-2 bg-green-500 text-white py-2 px-4 rounded-lg">
            The Type '{{ $type->name }}' has been restored
        </div>
    @endif

    {{-- ************************************************************* --}}

    
        <h1 class="mt-4 dark:text-gray-100" style="font-weight: 700">Trash can</h1>

        <div class="dark:text-gray-100 flex flex-col items-center">

            

            <table class="w-100 text-xs">
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
                    @foreach ($trashedTypes as $type)
                        <tr class=" items-center">
                            <td class="px-2 font-medium dark:text-gray-400">
                                {{ $type->name }}
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $type->description }}</p>
                            </td>
                            <td class="flex px-2 items-center">

                            <form class="d-inline-block mx-1 my-2" method="POST" action="{{ route('admin.types.restore', ['type' => $type->id]) }}">
                                @csrf
                                <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-gray-200 hover:text-black">
                                    Restore
                                </button>
                            </form>
                            <form method="POST" action="{{ route('admin.types.harddelete', $type->id) }}" class="my-2">
                                @csrf
                                @method('DELETE')
                                
                                <button type="submit" class="my-2 px-1 py-1 flex font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-red-500 hover:text-black">
                                    <span class="px-1">Permanently</span>
                                    <span>delete</span>
                                </button>
                            </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
            <button class="my-4 px-8 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                <a class="button mx-1" href="{{ route('admin.types.index') }}">Return to list</a>
            </button>
        </div>

        {{ $trashedTypes->links() }}

    @endsection
</x-app-layout>

