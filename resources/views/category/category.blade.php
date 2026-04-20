<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">


    <div class="table-responsive">
        <form method="POST" id="categoriesFilterForm" action="{{ route('category.reload') }}" class="p-6">
            @csrf
            @method('POST')
            <table cellspacing="0" cellpadding="4" border="1" class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td valign="top">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'category_modal'); onCreateNewCategory();">
                                {{ __('Create new category') }}
                            </x-danger-button>
                        </td>
                        <td  valign="top">
                            <x-input-label for="filter_by_status" value="{{ __('Show by category status:') }}"/>
                            <select size="1"
                                    id="filterCategoryStatus"
                                    name="filter_by_status"
                                    placeholder="{{ __('Category status') }}"
                                    required="required">
                                <option value="Enabled" @isset($filter_by_status) @if($filter_by_status == 'Enabled') selected @endif @endisset>Enabled categories</option>
                                <option value="Deleted" @isset($filter_by_status) @if($filter_by_status == 'Deleted') selected @endif @endisset>Deleted categories</option>
                                <option value="Both" @isset($filter_by_status) @if($filter_by_status == 'Both') selected @endif @endisset>Both Enabled and Deleted</option>
                            </select>
                        </td>
                        <td  valign="top">
                            <x-input-label for="filter_by_order" value="{{ __('Order by:') }}"/>
                            <select size="1"
                                    id="filterCategoryOrderBy"
                                    name="filter_by_order"
                                    placeholder="{{ __('Order by') }}"
                                    required="required">
                                <option value="id asc" @isset($filter_by_order) @if($filter_by_order == 'id asc') selected @endif @endisset>Id Ascent</option>
                                <option value="id desc" @isset($filter_by_order) @if($filter_by_order == 'id desc') selected @endif @endisset>Id Descent</option>
                                <option value="status asc" @isset($filter_by_order) @if($filter_by_order == 'status asc') selected @endif @endisset>Status Ascent</option>
                                <option value="status desc" @isset($filter_by_order) @if($filter_by_order == 'status desc') selected @endif @endisset>Status Descent</option>
                                <option value="name asc" @isset($filter_by_order) @if($filter_by_order == 'name asc') selected @endif @endisset>Name Ascent</option>
                                <option value="name desc" @isset($filter_by_order) @if($filter_by_status == 'name desc') selected @endif @endisset>Name Descent</option>
                            </select>
                        </td>
                        <td valign="top">
                            <x-input-label for="filter_by_category_id" value="{{ __('Show only by category:') }}"/>
                            <select size="1"
                                    id="filterCategoryId"
                                    name="filter_by_category_id"
                                    placeholder="{{ __('Show only by category') }}"
                                    required="required">
                              <option value="0" @isset($filter_by_category_id) @if($filter_by_category_id == 0) selected @endif @endisset>All categories</option>
                              @foreach ($filter_all_categories as $category)
                                <option value="{{ $category->id }}" @isset($filter_by_category_id) @if($filter_by_category_id == $category->id) selected @endif @endisset>{{ $category->name }} [{{ $category->productsCount() }}]</option>
                              @endforeach
                            </select>

                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div class="table-responsive">
        <table cellspacing="0" cellpadding="4" border="1" class="grid-table table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Edit</th>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td valign="top">
                        <x-secondary-button
                                type="submit"
                                class="edit_button"
                                x-data=""
                                category_id="{{ $category->id }}"
                                @click="$dispatch('open-modal', 'category_modal');"
                                >{{ __('Edit') }}</x-secondary-button>
                        </td>
                        <td  valign="top">
                            {{  $category->id }}
                        </td>
                        <td  valign="top">
                            @if ($category->status == "Deleted")
                                <span class="text-red">{{  $category->status }}</span>
                            @else
                                {{  $category->status }}
                            @endif
                        </td>
                        <td valign="top">
                            {{ $category->name }}
                        </td>
                        <td valign="top">
                            {{ $category->productsCount() }}
                        </td>
                        <td valign="top"">
                            @if ($category->hasFullDescription())
                                <span class="short_description_{{ $category->id }}" ">
                                    {!! $category->getShortDescription() !!}
                                    <a href="javascript:void(0);" class="more_description" id="{{ $category->id }}">more &gt;&gt;</a>
                                </span>
                                <span class="full_description_{{ $category->id }} hidden" id="{{ $category->id }}">
                                    <a href="javascript:void(0);" class="less_description" id="{{ $category->id }}">less &lt;&lt;</a>
                                    {!! $category->description !!}
                                </span>
                            @else
                                {!! $category->description !!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   <x-modal name="category_modal" id="categoryMmodal" focusable="focusable">
        <form method="POST" id="categoryForm" action="{{ route('category.save') }}" class="p-6">
            @csrf
            @method('POST')

            <input type="hidden" id="categoryId" name="id" value="0" />
            <input type="hidden" id="filter_by_status" name="filter_by_status" value="Enabled" />
            <input type="hidden" id="filter_by_order" name="filter_by_order" value="name asc" />
            <input type="hidden" id="filter_by_category_id" name="filter_by_category_id" value="0" />

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
                            rows="6"
                            class="w-full"
                            placeholder="{{ __('Category description') }}"
                            required="required"
                            autofocus="autofocus"
                            autocomplete="description"></x-text>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>

                <x-primary-button id="btnCategorySave" x-on:click="" class="ms-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/custom/categories.js') }}" defer="defer"></script>

</x-app-layout>
