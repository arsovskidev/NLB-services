@extends('layouts.app')

@section('css')
@endsection

@section('js')
@endsection

@section('title', 'Admin Panel')

@section('body')

    <body id="body-base">
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="bx bx-menu" id="header-toggle"></i>
            </div>
            <img src="{{ asset('images/nlb.png') }}" alt="NLB" height="32" />
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="/" class="nav_logo">
                        <i class="bx bx-layer nav_logo-icon"></i>
                        <span class="nav_logo-name">NLB Admin Panel</span>
                    </a>
                    <div class="nav_list">
                        <a data-target="admin-panel" class="scroll-to-link nav_link active">
                            <i class="bx bx-code-alt nav_icon"></i>
                            <span class="nav_name">Admin Panel</span>
                        </a>
                        <a data-target="Users" class="scroll-to-link nav_link">
                            <i class="bx bx-stats nav_icon"></i>
                            <span class="nav_name">Users</span>
                        </a>
                    </div>
                </div>
                <div>
                  <a class="nav_link">
                    <i class='bx bx-user nav-icon'></i>
                    <span class="nav_name">{{ Auth::user()->name }}</span>
                  </a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    <button type="submit" class="nav_link" href="{{ route('logout') }}">
                      <i class='bx bx-exit'></i>
                      <span class="nav_name">Sign Out</span>
                    </button>
                  </form>
                </div>
            </nav>
        </div>
        <div>
            <section class="content-section" id="admin-panel">
                <h1 class="fw-normal">Admin Panel</h1>
                <h4 class="fw-light">
                    <div>Version: <span class="text-purple">1.0.0</span></div>
                </h4>
                <hr class="my-6">
                <div class="">
                    <h2>Register a new client</h2>
                    <form action="{{ route('clients.store') }}" method="POST" autocomplete="off" class="w-full">
                      @csrf
                        <x-input id="name" class="block my-3 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="text" name="name" :value="old('Name')"  placeholder="Name"/>
                          @error('name')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                              {{ $message }}
                            </span>
                          @enderror
                        <x-input id="surname" class="block my-3 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="text" name="surname" :value="old('Surname')" placeholder="Surname"/>
                          @error('surname')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                              {{ $message }}
                            </span>
                          @enderror
                        <x-input id="email" class="block my-3 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="text" name="email" :value="old('email')" placeholder="Email"/>
                          @error('email')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                              {{ $message }}
                            </span>
                          @enderror
                        <x-input id="password" class="block mt-3 mb-2 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="password" name="password" :value="old('password')" placeholder="Password"/>
                          @error('password')
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                              {{ $message }}
                            </span>
                          @enderror
                        <x-button class="mt-4 bg-indigo-500 hover:bg-indigo-700">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                    @if (Session::has("success"))
                      <div class="bg-green-200 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md w-full lg:w-1/4 my-2" role="alert">
                        <div class="flex">
                          <div class="py-1">
                            <svg class="animate-ping fill-current h-6 w-6 mr-4 text-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                          <div class="my-auto">
                            <p class="font-bold text-green-700">{{ Session::get("success") }}</p>
                          </div>
                        </div>
                      </div>
                    @elseif(Session::has('error'))
                      <div class="col-md-12 alert alert-danger">
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full lg:w-1/4 animate-pulse" role="alert">
                          <strong class="font-bold">Whoops!</strong>
                          <span class="block sm:inline">Something went wrong</span>
                        </div>
                      </div>
                    @endif
                </div>
            </section>
            <section class="content-section" id="Users">
                <h1 class="fw-normal">Users</h1>
                <hr class="my-2">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto">
                      <div class="py-2 align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Info
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @foreach ($clients as $client)
                                <tr>
                                  <td class="px-6 py-4 whitespace-nowrap">
                                      <div class="flex items-center">
                                        <div>
                                          <div class="text-sm font-medium text-gray-900">
                                            {{ $client->name }} {{ $client->surname }}
                                          </div>
                                          <div class="text-sm text-gray-500">
                                            {{ $client->email }}
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('clients.edit', $client->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <br>
                                    <form method="POST" action="{{ route('clients.delete', $client->id) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
            </section>
        </div>
    </body>
@endsection