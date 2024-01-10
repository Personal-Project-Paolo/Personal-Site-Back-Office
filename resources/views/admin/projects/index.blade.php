<x-app-layout>
    @section ('contents')

        {{-- ******************************************************************** --}}

            @if (session('delete_success'))
                    
            @php $project = session('delete_success') @endphp

            <div class="flex items-center dark:text-gray-100 mt-2">
                The Project '{{$project->title}}' has moved to the trash
                <form 
                    action="{{ route('admin.projects.restore', ['project' => $project]) }}"
                    class="d-inline-block flex" 
                    method="POST" 
                    >
                    @csrf
                    <button class="mx-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">Ripristina</button>
                </form>
            </div>

            @endif

            @if (session('restore_success'))

            @php
                $project = session('restore_success')
            @endphp

            <div class="dark:text-gray-100 mt-2">
                The Project '{{$project->title}}' has been restored
            </div>

            @endif

        {{-- *********************************************************************** --}}

        

        <div class="dark:text-gray-100">
            <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">My Projects</h2>

            
        
            <button type="button" class="mr-1 mb-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-700 hover:text-white hover:scale-105 duration-200">
                <a href="{{ route("admin.projects.create") }}">Create a new Project</a>
            </button>
            <button class="mb-4 px-8 py-2 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-red-700 hover:text-white hover:scale-110 duration-200">
                <a class="button" href="{{ route('admin.projects.trashed') }}">Trash</a>
            </button>

            <div>
                <table class="w-full p-6 text-xs text-left whitespace-nowrap">
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
                        @foreach ($projects as $project)
                            <tr class="project-item">
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
                                <td class="px-2 py-2 whitespace-normal">
                                    <p>{{ $project->collaborators }}</p>
                                </td>
                                <td class="px-2 py-2">
                                    <p>
                                        <a href="{{ route('admin.preview.show', ['preview' => $project->id]) }}" class="hover:text-blue-500 hover:underline">Preview</a>
                                    </p>
                                </td>
                                <td class="px-2 py-2">
                                    <p>{{ $project->description }}</p>
                                </td>
                                <td class="px-2 py-2">
                                    <p>
                                        <a 
                                            href="{{ route('admin.types.show', ['type' => $project->type]) }}"
                                            class="hover:underline hover:text-blue-500 dark:hover:text-blue-300"
                                        >
                                            {{ $project->type->name }}
                                        </a>
                                    </p>
                                </td>
                                <td class="px-2 py-2">
                                    @foreach ($project->technologies as $technology)
                                        <button class="border-2 border-lime-700 text-green-600 dark:text-green-400 hover:bg-gray-200 dark:hover:bg-green-700 hover:text-black dark:hover:text-white px-2 py-1 rounded">
                                            <a href="{{ route('admin.technologies.show', ['technology' => $technology]) }}" class="text-decoration-none">{{ $technology->name }}</a>
                                        </button>
                                        <!-- {{ !$loop->last ? ',' : '' }} -->
                                    @endforeach
                                </td>
                                
                                <td class="px-1 py-1">
                                    <button class="border-2 text-blue-500 dark:text-blue-300 hover:bg-blue-100 dark:hover:bg-blue-700 hover:text-white dark:hover:text-white px-4 py-1 rounded">
                                        <a class="text-decoration-none" href="{{ $project->link_github }}">Link</a>
                                    </button>
                                </td>
                                <td class="px-1 py-2 ">
                                    <div class="flex">
                                        <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-blue-500 hover:text-black">
                                            <a class="button mx-1" href="{{ route('admin.projects.show', ['project' => $project]) }}">View</a>
                                        </button>

                                        <button class="ml-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-yellow-500 hover:text-black">
                                            <a class="button mx-1" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a>
                                        </button>

                                        <form
                                            action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                            method="post"
                                            class="d-inline-block mx-1"
                                        >
                                            @csrf
                                            @method('delete')
                                            <button class="px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100 hover:bg-red-700 hover:text-white">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="my-4">
                {{ $projects->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    @endsection
</x-app-layout>