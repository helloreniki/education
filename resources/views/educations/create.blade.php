<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm: sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Add New Education</h1>
        <p class="mt-2 text-sm text-gray-700">Please fill in all fields.</p>
      </div>

      <form method="POST" action="{{ route('educations.store') }}" class="my-6 max-w-3xl ">
        @csrf

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="grid grid-cols-2 grid-flow-row-dense gap-x-16">

          <div class="mt-4">
            <x-label for="title" :value="__('Title')" />
            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
          </div>

          <!-- Organiser -->
          <div class="mt-4">
            <x-label for="organiser" :value="__('Organiser of education')" />
            <x-select name="organiser_id" id="organiser" class="block mt-1 w-full">
              <option value="">Select organiser</option>
              @foreach ($organisers as $organiser)
              <option value="{{ $organiser->id }}" @selected(old('organiser') == $organiser->id)>{{ $organiser->name}}</option>
              @endforeach
            </x-select>
          </div>

          <!-- Date -->
          <div class="mt-4">
            <x-label for="date" :value="__('Date')" />
            <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required />
          </div>

          {{-- City --}}
          <div class="mt-4">
            <x-label for="city" :value="__('City')" />
            <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
          </div>

          {{-- Price --}}
          <div class="mt-4">
            <x-label for="price" :value="__('Price in Euros')" />
            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required />
          </div>

          {{-- Credits --}}
          <div class="mt-4">
            <x-label for="credits" :value="__('Credits')" />
            <x-input id="credits" class="block mt-1 w-full" type="number" name="credits" :value="old('credits')" required />
          </div>

        </div>

        <x-button class="my-8 bg-indigo-500 hover:bg-indigo-700">Add new education</x-button>

      </form>

    </div>
  </div>
</x-app-layout>
