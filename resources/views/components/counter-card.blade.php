
    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
        <div class="bg-indigo-50 font-semibold h-10 mr-4 pt-2 px-4 rounded-full text-indigo-600 text-xl">
            {{ $icon ?? '' }}
        </div>
        <div>
            <p class="mb-2  font-medium text-gray-600">
                {{ $text ?? '' }}
            </p>
            <p class="text-lg font-semibold text-gray-700">
                {{ $count ?? '' }}
            </p>
            <p class="text-lg font-semibold text-gray-700">
                {{ $slot }}
            </p>
        </div>
    </div>
