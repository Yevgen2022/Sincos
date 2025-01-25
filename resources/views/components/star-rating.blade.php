

<div class="flex items-center space-x-1">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $rating)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20"
                 fill="currentColor" aria-hidden="true">
                <path d="M10 15.27L16.18 19l-1.64-7.03L18 8.24l-7.19-.61L10 1 9.19 7.63 2 8.24l4.46 3.73L3.82 19z"/>
            </svg> <!-- Заповнена зірочка -->
        @else
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-300" viewBox="0 0 20 20"
                 fill="currentColor" aria-hidden="true">
                <path d="M10 15l-5.878 3.09L5.29 12.8l-6.287-5.96 8.208-.653L10 0l3.787 6.487 8.208.653-6.287 5.96 1.167 5.29L10 15z"/>
            </svg> <!-- Порожня зірочка -->
        @endif
    @endfor
</div>
