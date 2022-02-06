<div class="md:flex mt-8 md:-mx-4">
    @foreach ($categories as $category)
        <div class="container my-12 mx-auto px-4 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                {{-- <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2" --}}
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3"
                    style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">{{ $category->name }}</h2>
                            {{-- <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Tempore facere provident molestias ipsam sint voluptatum pariatur.</p> --}}
                            <a href="{{ route('category.product', $category->id) }}"
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <span>Shop Now</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
        style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Games</h2>
                <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                    Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                <button
                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                    <span>Shop Now</span>
                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div> --}}
</div>
