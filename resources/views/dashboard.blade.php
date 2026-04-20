<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="container">


    <div x-data
        @open-modal.window="new bootstrap.Modal(document.getElementById('categoryMmodal')).show();">
    </div>

   <x-modal name="category_modal" id="categoryMmodal" focusable="focusable">
        <form method="post" class="p-6">
            @csrf
            @method('POST')

            <input type="hidden" id="categoryId" name="id" value="0" />

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Category manage') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="status" value="{{ __('Category status') }}"/>
                <select size="1"
                        id="categoryStatus"
                        name="status"
                        class="w-full"
                        placeholder="{{ __('Category status') }}"
                        required="required">
                    <option value="Enabled">Enabled</option>
                    <option value="Deleted">Deleted</option>
                </select>
            </div>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Category name') }}"/>
                <x-text-input
                    id="categoryName"
                    name="name"
                    type="text"
                    class="w-full"
                    placeholder="{{ __('Category name') }}"
                    required="required"
                    autofocus="autofocus"
                    autocomplete="name"
                />
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Category description') }}"/>
                <x-textarea name="description"
                            id="categoryDescription"
                            rows="10"
                            class="w-full"
                            placeholder="{{ __('Category description') }}"
                            required="required"
                            autofocus="autofocus"
                            autocomplete="description"></x-text>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>

                <x-primary-button id="btnCategorySave" class="ms-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
