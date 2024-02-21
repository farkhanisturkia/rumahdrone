
    <div class="bg-cover h-[100vh] px-[2rem] md:px-[4rem] lg:px-[8rem] py-6" style="background-image: url('img/background.jpg');">
        <div>
            <div class="flex justify-between items-center">
                <div class="top-4 left-4">
                    <p class="hidden sm:inline lg:text-2xl font-bold text-white">Logo</p>
                </div>
                <div class="space-x-6 md:space-x-12 z-50">
                    @if (Route::has('login'))
                        @auth
                            <Link href="{{ url('/dashboard') }}" class="py-2.5 px-3 no-underline text-md font-semibold text-white rounded-md border border-white hover:shadow-md">Dashboard</Link>
                        @else
                            <Link href="{{ route('login') }}" class="py-2.5 px-3 no-underline text-md font-bold text-white rounded-md border border-white hover:shadow-md">Login</Link>
                        @endauth
                    @endif
                </div>
            </div>
            <div class="pt-24 md:pt-32 lg:pt-48 flex justify-center item-center">
                    <div class="text-center">
                        <div>
                            <p class="font-bold text-xl sm:text-2xl lg:text-3xl text-white">Rumah<span class="text-green-500"> Drone</span></p>
                        </div>
                        <div class="mt-2 mb-2.5">
                            <p class="font-semibold text-2xl md:text-3xl lg:text-5xl text-slate-300">Monitoring Your Drone Co`op E-commerce</p><br>
                        </div>
                        <div>
                            <span class=" text-slate-200 font-semibold">
                                Sistem pengolahan data online rumah drone.<br>
                                Menjual berbagai jenis drone dan <br>
                                aksesorisnya.
                            </span>
                        </div>
                    </div>
            </div>
        </div>
    </div>