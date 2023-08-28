<x-app-layout>
    @section('contents')

    {{-- *************************************************************** --}}

    @if (session('delete_success'))
        @php $type = session('delete_success') @endphp
        <div class="alert alert-danger dark:text-gray-100 mt-2">
            The Type "{{ $type->name }}" has moved to the trash
        </div>
    @endif

    {{-- *************************************************************** --}}

        <button type="button" class="my-2 px-8 py-3 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
            <a href="{{ route("admin.types.create") }}">Create a new Type</a>
        </button>

        <div class="dark:text-gray-100">
            <table class="w-full p-6 text-xs text-left whitespace-nowrap">
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
                    @foreach ($types as $type)
                        <tr>
                            <td class="px-2 text-1xl font-medium dark:text-gray-400">
                                {{ $type->name }}
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $type->description }}</p>
                            </td>
                            <td class="flex pl-2">
                                <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                    <a class="btn btn-primary" href="{{ route('admin.types.show', ['type' => $type->id]) }}">View</a>
                                </button>

                                <button class="ml-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                    <a class="btn btn-warning" href="{{ route('admin.types.edit', ['type' => $type->id]) }}">Edit</a>
                                </button>
                                
                                <form
                                    action="{{ route('admin.types.destroy', ['type' => $type->id]) }}"
                                    method="post"
                                    class="d-inline-block mx-1"
                                    >
                                    @csrf
                                    @method('delete')
                                    <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                        Delete
                                    </button>
                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    @endsection
</x-app-layout>

