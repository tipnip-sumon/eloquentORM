<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    {{session('message')}}
    <x-form action="{{route('user.store')}}" method="POST">
        <div class="row">
            <x-input-label value="Full Name"></x-input-label>
            <x-input type="text" name="f_name" id="f_name" placeholder="Enter Full Name"></x-input>
            @error('f_name')
            <x-alert type="danger" :$message></x-alert>
            @enderror
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
            <x-input-label value="Password Confirmation"></x-input-label>
            <x-input type="password" name="password_confirmation" id="password_confirmation"  placeholder="Enter Confirm Password"></x-input>
            @error('password_confirmation')
            <x-alert type="danger" :$message></x-alert>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
            @session('status')
            <x-alert type="success" class="mt-5" message="{{session('status')}}"></x-alert>
            @endsession
        </div>
    </x-form>
</x-layout>