<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Country') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="card push-top container">
                        <div class="card-body">
                            <form method="post" action="{{ route('country.store') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="name"> Enter Country Name</label>
                                    <input type="text" class="form-control" name="countryname" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="shortname">Short Name</label>
                                    <input type="text" class="form-control" name="shortname" />
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phonecode">Phonecode</label>
                                    <input type="text" class="form-control" name="phonecode" />
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Add Country</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
