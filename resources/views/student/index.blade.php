<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('students.create') }}" class="btn btn-info btn-sm mb-2 ml-2 float-right">Add
                        Student</a>
                    <a href="{{ route('country.create') }}" class="btn btn-info btn-sm mb-2 ml-2 float-right">Add
                        Country</a>
                    <a href="{{ route('state.create') }}" class="btn btn-info btn-sm mb-2 ml-2 float-right">Add
                        State</a>
                    <a href="{{ route('city.create') }}" class="btn btn-info btn-sm mb-2 ml-2 float-right">Add
                        City</a>
                    <table class="table">
                        <thead>
                            <tr class="table-warning">
                                <td>ID</td>
                                <td>Name</td>
                                <td>Country</td>
                                <td>State</td>
                                <td>City</td>
                                <td>Email</td>
                                <td>Phone</td>
                                <td class="text-center">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->countryName }}</td>
                                    <td>{{ $value->stateName }}</td>
                                    <td>{{ $value->cityName }}</td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('students.edit', $value->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('students.destroy', $value->id) }}" method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
