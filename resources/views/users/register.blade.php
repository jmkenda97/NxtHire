     <x-layout>         
              
              <x-card
                    class="p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Register
                        </h2>
                        <p class="mb-4">Create an account to post gigs</p>
                    </header>

                    <form method="POST" action="/users">
                        @csrf
                        <div class="mb-6">
                            <label
                                for="name"
                                class="inline-block text-lg mb-2"
                                >Name</label
                            >
                    <div class="relative">
                         <i class="fa fa-user absolute left-3 top-3 text-gray-400"></i>
                         <input
                             type="text"
                             class="pl-10 border border-gray-200 rounded p-2 w-full"
                             name="name"
                             value="{{ old('name') }}"
                         />
                     </div>
                            @error('name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                    

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Email</label
                            >
                     <div class="relative">
                          <span class="absolute left-3 top-2.5">📧</span> {{-- You can also use a Font Awesome icon --}}
                          <input
                              type="email"
                              id="email"
                              name="email"
                              value="{{ old('email') }}"
                              class="pl-10 border border-gray-200 rounded p-2 w-full"
                          />
                      </div>
                             @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                      <!                      -- Password Field -->
                      <div class="mb-6 relative">
                          <label for="password" class="inline-block text-lg mb-2">Password</label>
                          <input
                              type="password"
                              id="password"
                              name="password"
                              class="border border-gray-200 rounded p-2 w-full"
                                              />
    <span
        class="absolute right-3 top-[38px] cursor-pointer"
        onclick="togglePassword('password')">👁️
    </span>
         @error('password')
             <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
                      </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-6 relative">
                        <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="border border-gray-200 rounded p-2 w-full"
                        />
                        <span
                            class="absolute right-3 top-[38px] cursor-pointer"
                            onclick="togglePassword('password_confirmation')">👁️
                        </span>
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                     
                        <div class="mb-6">
                            <button type="submit"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Sign Up
                            </button>
                        </div>

                        <div class="mt-8">
                            <p>
                                Already have an account?
                            <a href="/login" class="text-laravel">Login</a>
                            </p>
                        </div>
                    </form>
                </x-card>
     </x-layout>