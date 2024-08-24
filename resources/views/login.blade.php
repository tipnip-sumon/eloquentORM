<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>
    {{session('message')}}
    <x-form action="{{ route('loginCheck') }}" method="POST">
        <div class="row">
            <x-input-label value="Email address"></x-input-label>
            <x-input type="email" name="email" id="email"  placeholder="Enter Email Address"></x-input>
            @error('email')
            <x-alert type="danger" :$message></x-alert>
            @enderror
            <x-input-label value="Password"></x-input-label>
            <x-input type="password" name="password" id="password"  placeholder="Enter Your Password"></x-input>
            @error('password')
            <x-alert type="danger" :$message></x-alert>
            @enderror
            <button type="submit" class="btn btn-primary">Login</button>
            @session('status')
            <x-alert type="success" class="mt-5" message="{{session('status')}}"></x-alert>
            @endsession
        </div>
    </x-form>
</x-layout>