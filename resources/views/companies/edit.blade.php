<x-app-layout>
    {{-- layout for form --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Add Company') }}
                    </h2>
                    <form method="post" action="{{ route('companies.update', $company->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        @if (isset($company))
                            @method('PUT')
                        @endif
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $company->name)"  required autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $company->email)"  required autocomplete="email" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <x-input-label for="logo" :value="__('Logo')" />
                        <x-text-input id="logo" name="logo" type="file" class="mt-1 block w-full" :value="old('logo', $company->logo)"  />
                        <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                        @if (isset($company) && $company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="100">
                        @endif
                    </div>
                    <div>
                        <x-input-label for="website" :value="__('Website')" />
                        <x-text-input id="website" name="website" type="url" class="mt-1 block w-full" :value="old('website', $company->website)" required autocomplete="website" />
                        <x-input-error class="mt-2" :messages="$errors->get('website')" />
                    </div>
                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- layout-for form --}}
    </x-app-layout>
    