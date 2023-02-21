<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="card push-top container">
                        <div class="card-body">
                            <form method="post" action="{{ route('students.store') }}" id="formStudRegi">
                                @csrf
                                <div class="form-group mb-3">

                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="country">Country</label>
                                    <select id="country-dd" class="form-control" name="country" required>
                                        <option value="" disabled selected>Select Country</option>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="state">State</label>
                                    <select id="state-dd" class="form-control" name="state" required>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <select id="city-dd" class="form-control" name="city" required>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" required/>
                                </div>
                                <button type="submit" class="btn btn-sm btn-outline-success">Create User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
