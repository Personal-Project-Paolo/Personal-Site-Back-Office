<x-app-layout>
   
    @section ('contents')    

        <div class="dark:text-gray-100">
            <h2 class="mt-4 mb-4 text-2xl font-semibold leadi">{{ $project->title }}</h2>

            

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
                            <th class="p-2">Type</th>
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
                   
                        <tr>
                            <td class="px-2 text-1xl font-medium dark:text-gray-400">
                                <a 
                                    href="{{ route('admin.types.show', ['type' => $project->type]) }}"
                                >
                                    {{ $project->type->name }}
                                </a>
                            </td>
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
                            <td class="flex px-3 py-2">
                                <button class="ml-1 px-1 py-1 font-semibold border rounded dark:border-gray-100 dark:text-gray-100">
                                    <a class="button mx-1" href="{{ route('admin.projects.edit', ['project' => $project]) }}">Edit</a>
                                </button>

                                <form
                                    action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
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
        </div>
        <div class="container mb-5">
            <img src="{{ Vite::asset('storage/app/public/' . $project->image ) }}" alt="">
        </div>

    @endsection
   
    
</x-app-layout>