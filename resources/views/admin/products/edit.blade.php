<x-admin.layout>
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                Name
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('name')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">
                Category
            </label>
            <select name="category_id" id="category_id" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">
                Price
            </label>
            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $product->price) }}" placeholder="0.00" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('price')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">
                Image
            </label>
            @if ($product->image)
                <div class="mb-2">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="max-w-xs max-h-24 rounded border border-gray-200">
                </div>
            @endif
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('image')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">
                Stock
            </label>
            <input type="number" min="0" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required
                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('stock')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end space-x-3 pt-2">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                Back to List
            </a>
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 transition">
                Save Changes
            </button>
        </div>
    </form>
</x-admin.layout>
