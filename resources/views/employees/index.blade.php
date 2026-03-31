@extends('layouts.app')
@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Employees</h1>
        <a href="{{ route('employees.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ New Employee</a>
    </div>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Company</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Phone</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
            <tr class="hover:bg-gray-50">
                <td class="p-3 border">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                <td class="p-3 border">{{ $employee->company?->name ?? '—' }}</td>
                <td class="p-3 border">{{ $employee->email ?? '—' }}</td>
                <td class="p-3 border">{{ $employee->phone ?? '—' }}</td>
                <td class="p-3 border space-x-2">
                    <a href="{{ route('employees.edit', $employee) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="inline" onsubmit="return confirm('Delete this employee?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-400">No employees found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $employees->links() }}</div>
</div>
@endsection