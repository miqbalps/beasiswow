<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber-500
    dark:bg-amber-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800
    uppercase
    tracking-widest hover:bg-amber-600 dark:hover:bg-white focus:bg-amber-600 dark:focus:bg-white active:bg-amber-500
    dark:active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2
    dark:focus:ring-offset-amber-600 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>