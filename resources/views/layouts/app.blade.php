<x-layouts.base>
    {{-- If the user is authenticated --}}
    @auth()
        {{-- If the user is authenticated on the static sign in or the login page --}}
        @if (in_array(request()->route()->getName(),['login'],))
            {{ $slot }}
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            @include('components.plugins.fixed-plugin')
            {{ $slot }}
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts.footers.auth.footer')
                    </div>
                </div>
            </main>
        @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
            {{ $slot }}
        @endif
        <div class="mt-2">
            @include('layouts.footers.guest.footer')
        </div>
    @endguest

</x-layouts.base>
