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
                <a class="nav_link">
                    <i class='bx bx-user nav-icon'></i>
                    <span class="nav_name">{{ Auth::user()->name }}</span>
                </a>
            </nav>
        </div>
        <div>
            <section class="content-section" id="admin-panel">
                <h1 class="fw-normal">Edit Client Info</h1>
                <h4 class="fw-light">
                    <div>Client: <span class="text-purple">{{ $client->email }}</span></div>
                </h4>
                <hr class="my-6">
                <div>
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" autocomplete="off" class="w-full">
                        @csrf
                          <x-input id="name" class="block my-3 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="text" name="name" value="{{ $client->name }}"  placeholder="Name"/>
                            @error('name')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                                {{ $message }}
                              </span>
                            @enderror
                          <x-input id="surname" class="block my-3 w-full lg:w-1/4 placeholder-gray-400 border-indigo-300" type="text" name="surname" value="{{ $client->surname }}" placeholder="Surname"/>
                            @error('surname')
                              <span class="flex items-center font-medium tracking-wide text-red-500 text-xs">
                                {{ $message }}
                              </span>
                            @enderror
                          <x-button class="mt-4 bg-indigo-500 hover:bg-indigo-700">
                              {{ __('Submit') }}
                          </x-button>
                      </form>
                </div>
            </section>
        </div>
    </body>
@endsection