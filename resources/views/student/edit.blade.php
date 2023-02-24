<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-light overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900">
                    <div class="mt-4 card container">
                        <div class="card-body">
                            <form method="post" action="{{ route('students.update', $student->id) }}" id="formStudEdit">
                                @csrf
                                <div class="form-group mb-3">
                                    @method('PATCH')
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $student->name }}" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="country">Select Country</label>
                                    <select id="country-dd" name="country_id" class="form-control" required>
                                        @foreach ($countries as $data)
                                            <option value="{{ $data->id }}" @if ($data->id==$student->country) Selected @endif>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="state">Select State</label>
                                    <select id="state-dd" name="state_id" class="form-control" required>
                                        @foreach ($state as $data)
                                            <option value="{{ $data->id }}" @if ($data->id==$student->state) Selected @endif>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">Select City</label>
                                    <select id="city-dd" name="city_id" class="form-control" required>
                                        @foreach ($city as $data)
                                            <option value="{{ $data->id }}" @if ($data->id==$student->city) Selected @endif>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $student->email }}" required/>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="tel" class="form-control" name="phone"
                                        value="{{ $student->phone }}" id="phone" required/>
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-success">Update User</button>
                                </div>
                            </form>
                            <form action="{{ route('mail.store') }}" method="POST">
                                @csrf
                                <div class="form-group d-flex justify-content-center">
                                    <input type="email" name="email2" class="hidden" value="{{ $student->email }}">
                                    <input type="text" name="name2" class="hidden" value="{{ $student->name }}">
                                </div>
                                <div class="form-group d-flex justify-content-center">
                                    <button type="submit" class="btn btn-sm btn-outline-danger mt-3">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
