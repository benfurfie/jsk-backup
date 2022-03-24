<a
    {{ $attributes->class([
        'inline-flex items-center text-transparent bg-clip-text bg-gradient-to-tr from-indigo-500 to-pink-600'
    ]) }}
    target="_blank"
    rel="noopener nofollow"
>
    <span>{{ $slot }}</span>
    <svg class="w-4 h-4 stroke-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
</a>
