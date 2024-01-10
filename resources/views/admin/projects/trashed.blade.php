<x-app-layout>
    @section('contents')

        {{-- ********************************************************************** --}}

        @if (session('delete_success'))
            @php $project = session('delete_success') @endphp
            <div class="mt-2 dark:text-gray-100">
                The Project "{{ $project->title }}" has been permanently deleted
            </div>
        @endif

        {{-- ********************************************************************** --}}

        <h2 class="mt-2 mb-4 text-2xl font-semibold leadi dark:text-gray-100">Trasher</h2>
        <div class="dark:text-gray-100 my-4 flex flex-col items-center">

            
            <table class="p-6 text-xs text-left whitespace-nowrap">
                <colgroup>
                    <col class="w-5">
                    <col>
                    <col>
                    <col>
                    <col>
                    <col>
                    <col class="w-5">
                </colgroup>
                <thead>
                    <tr class="dark:bg-gray-700">
                        <th class="p-2">Title</th>
                        <th class="p-2">Id</th>
                        <th class="p-2">Author</th>
                        <th class="p-2">Creation Date</th>
                        <th class="p-2">Last Update</th>
                        <th class="p-2">Collaborators</th>
                        <th class="p-2">Image</th>
                        <th class="p-2">Description</th>
                        <th class="p-2">Type</th>
                        <th class="p-2">Technology</th>
                        <th class="p-2">Link</th>
                        <th class="p-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                    @foreach ($trashedProjects as $project)
                        <tr>
                            <td class="px-2 py-2">
                                <p>{{ $project->title }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <span>{{ $project->id }}</span>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $project->author }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $project->creation_date}}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $project->last_update }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $project->collaborators }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p><a href="/storage/{{$project->image}}">Preview</a></p>
                            </td>
                            <td class="px-2 py-2">
                                <p>{{ $project->description }}</p>
                            </td>
                            <td class="px-2 py-2">
                                <p>
                                    <a 
                                    href="{{ route('admin.types.show', ['type' => $project->type]) }}"
                                    >
                                    {{ $project->type->name }}
                                    </a>
                                </p>
                            </td>
                            <td class="px-2 py-2">
                                @foreach ($project->technologies as $technology)
                                    <a href="{{route('admin.technologies.show', ['technology' => $technology])}}">{{$technology->name}}
                                    </a>
                                    {{ !$loop->last ? ',' : '' }}
                                @endforeach
                            </td>
                            
                            <td class="px-2 py-2">
                                <p><a class="text-decoration-none" href="{{ $project->link_github }}">Link</a></p>
                            </td>
                            <td class="flex align-items px-3">
                                <form
                                    action=
                                    "{{ route('admin.projects.restore', ['project' => $project]) }}"
                                    method="post"
                                    class="d-inline-block mx-1"
                                >
                                    @csrf
                                    <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">Restore</button>
                                </form>
                                <form
                                    action="{{ route('admin.projects.harddelete', ['project' => $project->slug]) }}"
                                    method="post"
                                    class="d-inline-block mx-1"
                                >
                                    @csrf
                                    @method('delete')
                                    <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                        Permanently delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button class="my-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                <a class="button mx-1" href="{{ route('admin.projects.index') }}">Return to list</a>
            </button>
        </div>


        {{ $trashedProjects->links() }}
    @endsection
</x-app-layout>

