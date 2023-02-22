<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add City') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="card push-top container">
                        <div class="card-body">
                            <form method="post" action="{{ route('city.store') }}">
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
                                    <label for="state">Select State</label>
                                    <select id="state-dd" name="state_id" class="form-control">
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="name">Enter City Name</label>
                                    <input type="text" class="form-control" name="cityname" />
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Add City</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
