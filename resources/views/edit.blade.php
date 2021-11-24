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
                <h1 class="fw-normal">Admin Panel</h1>
                <h4 class="fw-light">
                    <div>Version: <span class="text-purple">1.0.0</span></div>
                </h4>
                <hr class="my-6">
                <div class="">
                    <h2>Register a new client</h2>
                    <form action="" autocomplete="off" class="w-full">

                        <x-input id="name" class="block my-3 w-full lg:w-1/4" type="text" name="name" :value="{{ $client->name }}"  placeholder="Name"/>

                        <x-input id="surname" class="block my-3 w-full lg:w-1/4" type="text" name="surname" :value="{{ $client->surname }}" placeholder="Surname"/>

                        <x-input id="email" class="block my-3 w-full lg:w-1/4" type="text" name="email" :value="{{ $client->email }}" placeholder="Email"/>

                        <x-button class="mt-4 bg-indigo-500 hover:bg-indigo-700">
                            {{ __('Submit') }}
                        </x-button>
                    </form>
                    <div class="bg-green-300 border-t-4 border-green-500 rounded-b text-teal-900 px-4 py-3 shadow-md w-1/2 my-2" role="alert">
                      <div class="flex">
                        <div class="py-1">
                          <svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                        <div>
                          <p class="font-bold">The client has been registered successfully</p>
                        </div>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
@endsection