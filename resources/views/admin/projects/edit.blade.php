<x-app-layout>

    @section('contents')
        <section class="m-6 p-6 dark:bg-gray-800 dark:text-gray-50">
            <div class="p-5">
                <h1>Edit Project</h1>
                <form 
                method="POST" 
                action="{{ route('admin.projects.update', ['project' => $project])}}" 
                enctype="multipart/form-data" 
                novalidate
                class="container flex flex-col mx-auto space-y-12"
                >
                    {{-- Per protezione dati --}}
                    @csrf 
                    {{-- Per protezione dati --}}
                    @method('PUT')

                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                        <div class="space-y-2 col-span-full lg:col-span-1">
                            <p class="font-medium">Informations</p>
                            <p class="text-xs">Put the information here to edit a project</p>
                        </div>
                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                            
                            {{-- Titolo del progetto --}}
                            
                            <div class="col-span-full sm:col-span-3">
                                <label 
                                for="title" class="form-label" style="font-weight:700; font-size:20px">
                                    Title
                                </label>
                                <input 
                                type="text" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control form-control @error('title') is-invalid @enderror" 
                                id="title" 
                                name="title" 
                                value="{{ old('title', $project->title)}}">
                
                                <div class="invalid-feedback">
                                    @error('title') {{ $message }} @enderror
                                </div>
                            </div>

                            {{-- Autore del progetto --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="author" class="form-label" style="font-weight:700; font-size:20px">
                                    Author
                                </label>
                                <input 
                                type="text" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control form-control @error('author') is-invalid @enderror" 
                                id="author" 
                                name="author" 
                                value="{{ old('author', $project->author)}}">
                
                                <div class="invalid-feedback">
                                    @error('author') {{ $message }} @enderror
                                </div>
                            </div>

                            {{-- Data di creazione del progetto --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="creation_date" class="form-label" style="font-weight:700; font-size:20px">
                                    Creation Date
                                </label>
                                <input 
                                type="date" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control form-control @error('creation_date') is-invalid @enderror" 
                                id="creation_date" 
                                name="creation_date" 
                                value="{{ old('creation_date', $project->creation_date)}}">
                                <div class="invalid-feedback">
                                    @error('creation_date') {{ $message }} @enderror
                                </div>
                            </div>

                            {{-- Data di dell'ultimo caricamento del progetto --}}

                            <div class="col-span-full sm:col-span-3">
                                <label for="last_update" class="form-label" style="font-weight:700; font-size:20px">
                                    Last Update
                                </label>
                                <input 
                                type="date" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control form-control @error('last_update') is-invalid @enderror" 
                                id="last_update" 
                                name="last_update" 
                                value="{{ old('last_update', $project->last_update)}}">
                                <div class="invalid-feedback">
                                    @error('last_update') {{ $message }} @enderror
                                </div>
                            </div>

                            <div class="col-span-full sm:col-span-6">
                                <label for="collaborators" class="form-label" style="font-weight:700; font-size:20px">
                                    Collaborators
                                </label>
                                <input 
                                type="text" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('collaborators') is-invalid @enderror" 
                                id="collaborators" name="collaborators" value="{{ old('collaborators', $project->collaborators)}}">
                
                                <div class="invalid-feedback">
                                    @error('collaborators') {{ $message }} @enderror
                                </div>
                            </div>
                       
                        </div>
                    </fieldset>

                    <fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm dark:bg-gray-900">
                        <div class="space-y-2 col-span-full lg:col-span-1">
                            <p class="font-medium">Other Informations</p>
                        </div>

                        <div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
                              {{-- Immagine del progetto --}}

                            <div class="col-span-full sm:col-span-6">
                                <label for="image" class="form-label"style="font-weight:700; font-size:20px">
                                    Image
                                </label>
                                <div class="input-group mb-3">
                                    <input type="file" 
                                    class="form-control @error('image') is-invalid @enderror" 
                                    id="image" name="image" accept="image/*">
                                    <label class="input-group-text" for="image">
                                        Upload
                                    </label>
                                </div>
                                <div class="invalid-feedback">
                                    @error('image') {{ $message }} @enderror
                                </div>
                            </div>

                            {{-- Tipologia del progetto --}}

                            <div class="col-span-full sm:col-span-6">
                                <label for="type" class="form-label">Type</label>
                                <select
                                    class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-select 
                                    @error('type_id') is-invalid @enderror"
                                    id="type"
                                    name="type_id"
                                >
                                    @foreach ($types as $type)
                                        <option
                                            value="{{ $type->id }}"
                                            @if (old('type_id', $project->type->id) == $type->id) selected @endif
                                        >
                                        {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Tecnologia del progetto --}}

                            <div class="col-span-full sm:col-span-6">
                                <h3>Technologies</h3>
                                @foreach($technologies as $technology)
                                    <div class="mb-3 form-check">
                                        <input
                                            type="checkbox"
                                            class="form-check-input"
                                            id="technology{{ $technology->id }}"
                                            name="technologies[]"
                                            value="{{ $technology->id }}"
                                            @if (in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all()))) checked @endif
                                        >
                                        <label class="form-check-label" for="technology{{ $technology->id }}">{{ $technology->name }}</label>
                                    </div>
                                @endforeach
                
                                {{-- @dump($errors->get('tags.*')) --}}
                                {{-- @error('tags')
                                    <div class="">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>

                            {{-- Link del progetto --}}

                            <div class="col-span-full sm:col-span-6">
                                <label for="link_github" class="form-label"style="font-weight:700; font-size:20px">
                                    Link
                                </label>
                                <input 
                                type="url" 
                                class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('link_github') is-invalid @enderror" 
                                id="link_github" 
                                name="link_github" 
                                value="{{ old('link_github', $project->link_github)}}">
                
                                <div class="invalid-feedback">
                                    @error('link_github') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Descrizione del progetto --}}

                        <div class="col-span-full sm:col-span-6">
                            <label for="description" class="form-label"style="font-weight:700; font-size:20px">
                                Description
                            </label>
                            <textarea 
                            class="w-full rounded-md focus:ring focus:ri focus:ri dark:border-gray-700 dark:text-gray-900 form-control @error('description') is-invalid @enderror" 
                            id="description" 
                            name="description" 
                            value="{{ old('description', $project->description)}}" 
                            rows="3" 
                            >{{ old('description', $project->description) }}
                            </textarea>
            
                            <div class="invalid-feedback">
                                @error('description') {{ $message }} @enderror
                            </div>
                        </div>
                    </fieldset>   
                   
                    <div class="flex justify-center p-6 rounded-md shadow-sm dark:bg-gray-900">
                        <button class="px-20 py-3 font-semibold rounded dark:bg-gray-100 dark:text-gray-800 col-span-full sm:col-span-1 btn">Save</button> 
                    </div>
                    
        
                </form>
                
            </div>
        </section>
    @endsection

</x-app-layout>