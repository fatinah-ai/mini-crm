@extends('layouts.app')
@section('content')
<div class="bg-white rounded shadow p-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-4">Edit Company</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block font-medium mb-1">Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="{{ old('name', $company->name) }}" class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $company->email) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Logo (min 100x100)</label>
            @if($company->logo)
                <img src="{{ asset('storage/'.$company->logo) }}" class="h-16 w-16 mb-2 rounded object-cover">
            @endif
            <input type="file" name="logo" class="w-full border rounded px-3 py-2">
            @error('logo')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="mb-4">
            <label class="block font-medium mb-1">Website</label>
            <input type="url" name="website" value="{{ old('website', $company->website) }}" class="w-full border rounded px-3 py-2">
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('companies.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancel</a>
        </div>
    </form>
</div>
@endsection