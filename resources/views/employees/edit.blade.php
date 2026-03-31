@extends('layouts.app')
@section('content')
<div class="bg-white rounded shadow p-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block font-medium mb-1">First Name <span class="text-red-500">*</span></label>
            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}" class="w-full border rounded px-3 py-2">
            @error('first_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Last Name <span class="text-red-500">*</span></label>
            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}" class="w-full border rounded px-3 py-2">
            @error('last_name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Company</label>
            <select name="company_id" class="w-full border rounded px-3 py-2">
                <option value="">— None —</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Phone</label>
            <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('employees.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection