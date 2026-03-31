@extends('layouts.app')
@section('content')
<div class="bg-white rounded shadow p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Companies list</h1>
        <a href="{{ route('companies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ New Company</a>
    </div>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-3 border">Logo</th>
                <th class="p-3 border">Name</th>
                <th class="p-3 border">Email</th>
                <th class="p-3 border">Website</th>
                <th class="p-3 border">Employees</th>
                <th class="p-3 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($companies as $company)
            <tr class="hover:bg-gray-50">
                <td class="p-3 border">
                    @if($company->logo)
                        <img src="{{ asset('storage/'.$company->logo) }}" class="h-10 w-10 object-cover rounded">
                    @else
                        <span class="text-gray-400">—</span>
                    @endif
                </td>
                <td class="p-3 border">{{ $company->name }}</td>
                <td class="p-3 border">{{ $company->email ?? '—' }}</td>
                <td class="p-3 border">
                    @if($company->website)
                        <a href="{{ $company->website }}" target="_blank" class="text-blue-500 underline">{{ $company->website }}</a>
                    @else —
                    @endif
                </td>
                <td class="p-3 border">{{ $company->employee_count }}</td>
                <td class="p-3 border space-x-2">
                    <a href="{{ route('companies.edit', $company) }}" class="bg-yellow-400 text-white px-3 py-1 rounded text-sm">Edit</a>
                    <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline" onsubmit="return confirm('Delete this company?')">
                        @csrf @method('DELETE')
                        <button class="bg-red-500 text-white px-3 py-1 rounded text-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-4 text-center text-gray-400">No companies found.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">{{ $companies->links() }}</div>
</div>
@endsection