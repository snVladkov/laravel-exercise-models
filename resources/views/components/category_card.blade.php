@props(['name', 'count'])

<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition flex items-center space-x-4">
    <div>
        <h3 class="font-bold text-lg text-gray-800">{{ $name }}</h3>
        <p class="text-sm text-gray-500">{{ $count }}</p>
    </div>
</div>
