<x-app-layout>

       
    @section('contents')

    {{-- *************************************************************** --}}

        @if (session('delete_success'))
        @php $type = session('delete_success') @endphp
            <div class="alert alert-danger">
                The Type "{{ $type->name }}" has moved to the trash
            </div>
        @endif

    {{-- *************************************************************** --}}

        <h2 class="dark:text-gray-100 mt-4 mb-4 text-2xl font-semibold leadi">{{ $type->name }}</h2>

        <div class="dark:text-gray-100">
            <table class="mt-2 w-full p-6 text-xs text-left whitespace-nowrap">
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
                            {{ $type->name }}
                        </td>
                        <td class="px-2 py-2">
                            <p>{{ $type->description }}</p>
                        </td>
                        <td class="flex pl-2">

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
                    
                </tbody>
            </table>
        </div>
            <div class="py-2 px-2 dark:text-gray-100">
                <h5>Latest Project in this Type</h5>
                <td>
                    @foreach ($type->projects as $project)
                        <li><a href="{{ route('admin.projects.show', ['project' => $project]) }}">{{ $project->title }}</a></li>
                    @endforeach
                </td>
            </div>
    @endsection
</x-app-layout>
