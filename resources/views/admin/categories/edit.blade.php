<x-admin.layout>
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Category</h1>

    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Name
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" placeholder="Enter category name" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end space-x-3 pt-2">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                Back to List
            </a>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                Save Changes
            </button>
        </div>
    </form>
</x-admin.layout>
