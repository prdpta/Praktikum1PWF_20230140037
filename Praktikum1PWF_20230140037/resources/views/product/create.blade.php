<x-app-layout>
    <div class="py-12 bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 p-8 shadow-2xl rounded-2xl border border-gray-700">
                <form action="{{ route('product.store') }}" method="POST" class="space-y-6" novalidate>
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-gray-400 mb-2">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="w-full bg-gray-900 border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-700' }} text-white rounded-xl focus:ring-indigo-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">Quantity <span class="text-red-500">*</span></label>
                            <input type="text" name="quantity" value="{{ old('quantity') }}" 
                                   class="w-full bg-gray-900 border {{ $errors->has('quantity') ? 'border-red-500' : 'border-gray-700' }} text-white rounded-xl">
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-400 mb-2">Price <span class="text-red-500">*</span></label>
                            <input type="text" name="price" value="{{ old('price') }}" 
                                   class="w-full bg-gray-900 border {{ $errors->has('price') ? 'border-red-500' : 'border-gray-700' }} text-white rounded-xl">
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-400 mb-2">Owner <span class="text-red-500">*</span></label>
                        <select name="user_id" class="w-full bg-gray-900 border {{ $errors->has('user_id') ? 'border-red-500' : 'border-gray-700' }} text-white rounded-xl">
                            <option value="">-- Select Owner --</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-4 pt-4 border-t border-gray-700">
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-8 py-2 rounded-xl font-bold transition shadow-lg">SAVE PRODUCT</button>
                        <a href="{{ route('product.index') }}" class="text-gray-400 hover:text-white">CANCEL</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>