@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <style>
        .card {
            max-width: 800px;
            margin: auto;
        }

        .interest-label {
            margin-right: 2rem;
            color: #9F6B46;
            font-weight: bold;
        }

        .btn {
            min-width: 150px;
        }

        .form-control::placeholder {
            color: #C9A28C !important;
        }

        body {
            font-family: 'Source Serif Pro', serif;
        }
    </style>

    <div class="justify-content-center">  
        <div class="card shadow border-0 rounded-4 p-4">
            <div class="card-header bg-transparent">
                <h2 class="fw-bold mb-4 text-center" style="color:#9F6B46;">
                    <i class="fa-solid fa-pen-to-square"></i> Update Profile
                </h2>
            </div>
            
            <div class="card-body">
                <form action="#" method="post" >
                 @csrf
                @method('PATCH')

                    <div class="row mb-4 align-items-center">
                        <div class="col-auto me-3">
                            {{-- @if () --}}
                                {{-- <img id="avatar-preview-existing" src="" 
                                    alt="" 
                                    class="rounded-circle shadow-sm mb-3"
                                    style="width:120px; height:120px; object-fit:cover; border:4px solid #9F6B46;"> --}}
                            {{-- @else --}}
                                <i id="avatar-preview-existing" class="fa-solid fa-circle-user mb-3" 
                                    style="font-size:120px; color:#9F6B46; text-shadow: 3px 3px 6px rgba(0,0,0,0.3);"></i>
                            {{-- @endif --}}
                        </div>
                        <div class="col">
                            <input type="file" name="avatar" id="avatar" 
                                    class="form-control shadow-sm border-0 w-75" accept="image/*">
                            <div class="form-text small mt-1" style="color:#9F6B46;">
                                Acceptable formats: jpeg, jpg, png, gif <br>
                                Max file size: 1048kb
                            </div>
                        </div>
                            
                            {{-- New preview will appear here --}}
                            <div id="avatar-preview-wrapper" class="mt-3"></div>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label fw-bold" style="color:#9F6B46;">Name</label>
                        <input type="text" name="name" id="name" class="form-control shadow-sm border-0" value="" autofocus>
                        @error('name')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-bold" style="color:#9F6B46;">Email</label>
                        <input type="email" name="email" id="email" class="form-control shadow-sm border-0" value="">
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="country" class="form-label fw-bold" style="color:#9F6B46;">Country</label>
                        <select name="country" class="form-control">
                            {{-- @foreach($countries as $code => $country)
                                <option value="{{ $code }}" 
                                    {{ old('country', $user->country) == $code ? 'selected' : '' }}>
                                    {{ $country['name'] }}
                                </option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="introduction" class="form-label fw-bold" style="color:#9F6B46;">Introduction</label>
                        <textarea name="introduction" id="introduction" rows="5" 
                                    class="form-control shadow-sm border-0" 
                                    placeholder="Describe yourself"></textarea>
                        @error('introduction')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="introduction" class="form-label fw-bold" style="color:#9F6B46;">Interest</label>
                        <div class="flex flex-wrap">
                            <label class="interest-label"><input type="radio" name="interest" class="me-1"> Travel</label>
                            <label class="interest-label"><input type="radio" name="interest" class="me-1"> Food</label>
                            <label class="interest-label"><input type="radio" name="interest" class="me-1"> Culture</label>
                            <label class="interest-label"><input type="radio" name="interest" class="me-1"> Nature</label>
                        </div>
                    </div>

                        <label for="current_password" class="form-label fw-bold" style="color:#9F6B46;">Change Password</label>

                    <div class="mb-4">             
                        <input type="password" name="current_password" id="current_password" 
                            class="form-control shadow-sm border-0" placeholder="Current Password">
                        @error('current_password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="password" name="password" id="password" 
                            class="form-control shadow-sm border-0" placeholder="New Password">
                        @error('password')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="form-control shadow-sm border-0" placeholder="Confirm New Password">
                    </div>

                    <div class="text-end">
                         <button type="button" 
                            class="btn shadow-sm me-3"
                            style="border: 2px solid #F1BDB2; color: #F1BDB2; font-weight: bold; background-color: transparent; transition: 0.3s;"
                            onmouseover="this.style.backgroundColor='#F1BDB2'; this.style.color='white';"
                            onmouseout="this.style.backgroundColor='transparent'; this.style.color='#F1BDB2';">
                            Cancel
                        </button>

                        <button type="submit" class="btn shadow-sm"
                            style="background-color:#F1BDB2; color:white; font-weight:bold; transition:0.3s;">
                            Save
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
    
@endsection