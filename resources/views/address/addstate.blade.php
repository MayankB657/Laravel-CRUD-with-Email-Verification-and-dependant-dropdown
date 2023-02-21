<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add State') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="card push-top container">
                        <div class="card-body">
                            <form method="post" action="{{ route('state.store') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="country">Select Country</label>
                                    <select id="country-dd" name="country_id" class="form-control">
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name"> Enter State Name</label>
                                    <input type="text" class="form-control" name="statename" />
                                </div>
                                <button type="submit" class="btn btn-sm btn-outline-success">Add State</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
