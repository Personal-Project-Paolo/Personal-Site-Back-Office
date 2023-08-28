<x-app-layout>
    @section('contents')

    {{-- ************************************************************* --}}

    @if (session('delete_success'))
        @php $type = session('delete_success') @endphp
        <div class="pt-4 alert alert-danger dark:text-gray-100 mt-2">
            The Type "{{ $type->name }}" has been permanently deleted
        </div>
    @endif


    @if (session('restore_success'))
        @php $type = session('restore_success') @endphp
        <div class="pt-4 alert alert-success dark:text-gray-100 mt-2">
            The Type '{{ $type->name }}' has been restored
        </div>
    @endif

    {{-- ************************************************************* --}}

    

        <div class="dark:text-gray-100">

            <h1 class="mt-4" style="font-weight: 700">Trash can</h1>

            <table class="w-100">
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
                        <tr>
                            <td class="px-2 text-1xl font-medium dark:text-gray-400">
                                {{ $type->name }}
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $type->description }}</p>
                            </td>
                            <td class="flex pl-2">

                                <form class="d-inline-block mx-1" method="POST" action="{{ route('admin.types.restore', ['type' => $type->id]) }}">
                                    @csrf
                                    <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">Restore</button>
                                </form>
                                <button type="button mx-1" class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 js_delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $type->id }}">
                                    Permanently delete
                                </button>
                                
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>

        {{ $trashedTypes->links() }}

    @endsection
</x-app-layout>

