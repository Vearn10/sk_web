<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SK Masiit | Youth Events Portal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#F53003',
                    }
                }
            }
        }
    </script>
    <style>
        /* This ensures smooth scrolling across all browsers */
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
            antialiased: true;
        }

        .hero-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#f5300310 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>

<body class="bg-white text-gray-900 hero-pattern">

    <nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/sk_masiit_logo.png') }}" alt="SK Masiit Logo"
                    class="w-10 h-10 object-contain rounded-lg shadow-lg shadow-orange-200" />
                <div class="font-bold text-2xl tracking-tighter text-gray-900">
                    SK <span class="text-primary">MASIIT</span>
                </div>
            </div>

            <div class="flex items-center gap-6">
                <a href="#events-section"
                    class="hidden md:block text-sm font-semibold hover:text-primary transition-colors uppercase tracking-wider">Schedules</a>
                <a href="/admin"
                    class="bg-gray-900 text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-primary transition shadow-md">
                    Admin Portal
                </a>
            </div>
        </div>
    </nav>

    <section class="py-16 lg:py-28">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <span
                class="bg-orange-100 text-primary text-[11px] font-bold px-4 py-1.5 rounded-full uppercase tracking-widest mb-6 inline-block">Official
                Youth Announcement</span>
            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight mb-8">
                Your Community. <br><span class="text-primary">Your Future.</span>
            </h1>
            <p class="text-xl text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
                Stay updated with the latest activities, programs, and schedules of Sangguniang Kabataan Barangay
                Masiit.
            </p>

            <div class="mb-16">
                <a href="#events-section"
                    class="bg-primary text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-xl hover:-translate-y-1 transition duration-300 inline-block">
                    View Event Schedules
                </a>
            </div>

            <div
                class="bg-[#fff2f2] border border-primary/20 p-6 rounded-2xl max-w-xl mx-auto flex items-start gap-4 text-left">
                <div class="bg-primary text-white p-2 rounded-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-bold text-primary text-sm uppercase italic">Important Notice</h4>
                    <p class="text-sm text-gray-700 font-medium">Please bring your valid IDs for registration during the
                        upcoming community sports fest.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="events-section" class="pb-32 px-6 scroll-mt-24">
        <div class="max-w-5xl mx-auto">
            <div class="flex items-center gap-4 mb-12">
                <h2 class="text-3xl font-bold tracking-tight">Upcoming Schedules</h2>
                <div class="h-[2px] flex-grow bg-gray-100"></div>
            </div>

            <div class="grid gap-6">
                @forelse($events as $event)
                    <div
                        class="bg-white border border-gray-100 p-6 lg:p-8 rounded-3xl shadow-sm hover:shadow-xl hover:border-primary/20 transition-all duration-300 flex flex-col lg:flex-row lg:items-center justify-between group">
                        <div class="mb-4 lg:mb-0">
                            <div class="flex items-center gap-3 mb-2">
                                <span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
                                <h3 class="text-2xl font-bold group-hover:text-primary transition-colors leading-tight">
                                    {{ $event->title }}
                                </h3>
                            </div>
                            <div class="flex flex-wrap gap-4 text-gray-500 text-sm">
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('F d, Y • h:i A') }}
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <span
                                class="inline-block px-6 py-2 rounded-xl bg-gray-50 text-gray-900 font-bold text-xs uppercase tracking-widest border border-gray-100">Open
                                for all youth</span>
                        </div>
                    </div>
                @empty
                    <div class="py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 font-medium">No events currently scheduled. Please check back later.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-gray-400 text-sm mb-4 italic">"Kaisa sa Pagbabago at Pag-unlad ng Kabataang Masiit"</p>
            <div class="h-px w-20 bg-primary mx-auto mb-8"></div>
            <p class="text-sm font-bold mb-2">Sangguniang Kabataan - Barangay Masiit</p>
            <p class="text-xs text-gray-500">Calauan, Laguna, Philippines</p>
            <p class="mt-12 text-[10px] text-gray-600 uppercase tracking-[0.2em]">© {{ date('Y') }} Official Portal</p>
        </div>
    </footer>

</body>

</html