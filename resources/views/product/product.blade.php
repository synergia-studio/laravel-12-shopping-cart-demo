<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">


    <div class="table-responsive">
        <form method="POST" id="productsFilterForm" action="{{ route('product.reload') }}" class="p-6">
            @csrf
            @method('POST')
            <table cellspacing="0" cellpadding="4" border="1" class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td valign="top">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'product_modal'); onCreateNewProduct();">
                                {{ __('Create new product') }}
                            </x-danger-button>
                        </td>
                        <td  valign="top">
                            <x-input-label for="filter_by_status" value="{{ __('Show by product status:') }}"/>
                            <select size="1"
                                    id="filterProductStatus"
                                    name="filter_by_status"
                                    placeholder="{{ __('Product status') }}"
                                    required="required">
                                <option value="Enabled" @isset($filter_by_status) @if($filter_by_status == 'Enabled') selected @endif @endisset>Enabled products</option>
                                <option value="Deleted" @isset($filter_by_status) @if($filter_by_status == 'Deleted') selected @endif @endisset>Deleted products</option>
                                <option value="Both" @isset($filter_by_status) @if($filter_by_status == 'Both') selected @endif @endisset>Both Enabled and Deleted</option>
                            </select>
                        </td>
                        <td  valign="top">
                            <x-input-label for="filter_by_order" value="{{ __('Order by:') }}"/>
                            <select size="1"
                                    id="filterProductOrderBy"
                                    name="filter_by_order"
                                    placeholder="{{ __('Order by') }}"
                                    required="required">
                                <option value="id asc">Id Ascent</option>
                                <option value="id desc">Id Descent</option>
                                <option value="status asc">Status Ascent</option>
                                <option value="status desc">Status Descent</option>
                                <option value="name asc">Name Ascent</option>
                                <option value="name desc">Name Descent</option>
                                <option value="quantity asc">Quantity Ascent</option>
                                <option value="quantity desc">Quantity Descent</option>
                                <option value="price asc">Price Ascent</option>
                                <option value="price desc">Price Descent</option>
                            </select>
                            <script>
                            window.addEventListener('load', function() {
                                jQuery(document).ready(function() {
                                    jQuery("#filterProductOrderBy").val("{{ $filter_by_order }}");
                                });
                            });
                            </script>
                         </td>
                        <td valign="top">
                            <x-input-label for="filter_by_category_id" value="{{ __('Show only categories:') }}"/>
                            <select size="1"
                                    id="filterCategoryId"
                                    name="filter_by_category_id"
                                    placeholder="{{ __('Show only categories') }}"
                                    required="required">
                              <option value="0" @isset($filter_by_category_id) @if($filter_by_category_id == 0) selected @endif @endisset>All categories</option>
                              @foreach ($all_categories as $category)
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
                    <th>Category</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td valign="top">
                        <x-secondary-button
                                type="submit"
                                class="edit_button"
                                x-data=""
                                product_id="{{ $product->id }}"
                                @click="$dispatch('open-modal', 'product_modal');"
                                >{{ __('Edit') }}</x-secondary-button>
                        </td>
                        <td  valign="top">
                            {{  $product->id }}
                        </td>
                        <td  valign="top">
                            @if ($product->status == "Deleted")
                                <span class="text-red">{{  $product->status }}</span>
                            @else
                                {{  $product->status }}
                            @endif
                        </td>
                        <td valign="top">
                            {{ $product->getCategoryName() }}
                        </td>
                        <td valign="top">
                            {{ $product->name }}
                        </td>
                        <td valign="top">
                            {{ $product->quantity }}
                        </td>
                        <td valign="top">
                            {{ $product->price }} EUR
                        </td>
                        <td valign="top"">
                            @if ($product->hasFullDescription())
                                <span class="short_description_{{ $product->id }}" ">
                                    {!! $product->getShortDescription() !!}
                                    <a href="javascript:void(0);" class="more_description" id="{{ $product->id }}">more &gt;&gt;</a>
                                </span>
                                <span class="full_description_{{ $product->id }} hidden" id="{{ $product->id }}">
                                    <a href="javascript:void(0);" class="less_description" id="{{ $product->id }}">less &lt;&lt;</a>
                                    {!! $product->description !!}
                                </span>
                            @else
                                {!! $product->description !!}
                            @endif
                         </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   <x-modal name="product_modal" id="productMmodal" focusable="focusable">
        <form method="POST" id="productForm" action="{{ route('product.save') }}" class="p-6">
            @csrf
            @method('POST')

            <input type="hidden" id="productId" name="id" value="0" />
            <input type="hidden" id="filter_by_status" name="filter_by_status" value="Enabled" />
            <input type="hidden" id="filter_by_order" name="filter_by_order" value="name asc" />
            <input type="hidden" id="filter_by_category_id" name="filter_by_category_id" value="0" />

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Product manage') }}
            </h2>

            <div class="mt-6">
                <x-input-label for="status" value="{{ __('Product status') }}"/>
                <select size="1"
                        id="productStatus"
                        name="status"
                        class="w-full"
                        placeholder="{{ __('Product status') }}"
                        required="required">
                    <option value="Enabled">Enabled</option>
                    <option value="Deleted">Deleted</option>
                </select>
            </div>
            <div class="mt-6">

                <x-input-label for="filter_by_category_id" value="{{ __('Show all categories:') }}"/>
                <select size="1"
                        id="productCategoryId"
                        name="category_id"
                        type="text"
                        class="w-full"
                        placeholder="{{ __('Show all categories') }}"
                        required="required">
                    @foreach ($all_categories as $category)
                        <option value="{{ $category->id }}" @isset($filter_by_category_id) @if($filter_by_category_id == $category->id) selected @endif @endisset>{{ $category->name }} [{{ $category->productsCount() }}]</option>
                    @endforeach
                </select>
            </div>
            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Product name') }}"/>
                <x-text-input
                    id="productName"
                    name="name"
                    type="text"
                    class="w-full"
                    placeholder="{{ __('Product name') }}"
                    required="required"
                    autofocus="autofocus"
                    autocomplete="name"
                />
            </div>
            <div class="mt-6">
                <x-input-label for="quantity" value="{{ __('Quantity') }}"/>
                <x-text-input
                    id="productQuantity"
                    name="quantity"
                    type="number"
                    min="1"
                    step="1"
                    class="w-full"
                    placeholder="{{ __('Product quantity') }}"
                    required="required"
                    autofocus="autofocus"
                    autocomplete="name"
                />
            </div>
            <div class="mt-6">
                <x-input-label for="price" value="{{ __('Price') }}"/>
                <x-text-input
                    id="productPrice"
                    name="price"
                    type="text"
                    class="w-full"
                    placeholder="{{ __('Product price') }}"
                    required="required"
                    autofocus="autofocus"
                    autocomplete="name"
                />
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="{{ __('Product description') }}"/>
                <x-textarea name="description"
                            id="productDescription"
                            rows="6"
                            class="w-full"
                            placeholder="{{ __('Product description') }}"
                            required="required"
                            autofocus="autofocus"
                            autocomplete="description"></x-text>
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">{{ __('Cancel') }}</x-secondary-button>

                <x-primary-button id="btnProductSave" x-on:click="" class="ms-3">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </x-modal>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/custom/products.js') }}" defer="defer"></script>

</x-app-layout>
