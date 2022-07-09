<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm: sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Create New Employee</h1>
        <p class="mt-2 text-sm text-gray-700">Please fill in all fields.</p>
      </div>

      <form method="POST" action="{{ route('employees.store') }}" class="my-6 max-w-3xl ">
        @csrf

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="grid grid-cols-2 grid-flow-row-dense gap-x-16">

          <div class="mt-4">
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
          </div>

          <!-- Email Address -->
          <div class="mt-4">
              <x-label for="email" :value="__('Email')" />
              <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
          </div>

          <!-- Work Email -->
          <div class="mt-4">
            <x-label for="work_email" :value="__('Work Email')" />
            <x-input id="work_email" class="block mt-1 w-full" type="email" name="work_email" :value="old('work_email')" required />
          </div>

          {{-- Address --}}
          <div class="mt-4">
            <x-label for="address" :value="__('Address')" />
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
          </div>

          {{-- Phone Number --}}
          <div class="mt-4">
            <x-label for="phone_number" :value="__('Phone Number')" />
            <x-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
          </div>

          {{-- Date of employment --}}
          <div class="mt-4">
            <x-label for="date_of_employment" :value="__('Date Of Employment')" />
            <x-input id="date_of_employment" class="block mt-1 w-full" type="date" name="date_of_employment" :value="old('date_of_employment')" required />
          </div>

          {{-- Work_position --}}
          <div class="mt-4">
            <x-label for="work_position" :value="__('Work Position')" />
            <x-select name="work_position_id" id="work_position" class="block mt-1 w-full">
              <option value="">Select work position</option>
              @foreach ($work_positions as $work_position)
              <option value="{{ $work_position->id }}" @selected(old('work_position') == $work_position->id)>{{ $work_position->name}}</option>
              @endforeach
            </x-select>
          </div>

          {{-- Profession --}}
          <div class="mt-4">
            <x-label for="profession" :value="__('Profession')" />
            <x-select name="profession_id" id="profession" class="block mt-1 w-full">
              <option value="">Select profession</option>
              @foreach ($professions as $profession)
              <option value="{{ $profession->id }}" @selected(old('profession') == $profession->id)>{{ $profession->name}}</option>
              @endforeach
            </x-select>
          </div>

          {{-- Department --}}
          <div class="mt-4">
            <x-label for="department" :value="__('Department')" />
            <x-select name="department_id" id="department" class="block mt-1 w-full">
              <option value="">Select department</option>
              @foreach ($departments as $department)
              <option value="{{ $department->id }}" @selected(old('department') == $department->id)>{{ $department->name}}</option>
              @endforeach
            </x-select>
          </div>

          {{-- Licence number --}}
          <div class="mt-4">
            <x-label for="licence_number" :value="__('Licence Number')" />
            <x-input id="licence_number" class="block mt-1 w-full" type="date" name="licence_number" :value="old('licence_number')" required />
          </div>

          {{-- Licence start date --}}
          <div class="mt-4">
            <x-label for="licence_start_date" :value="__('Licence Start Date')" />
            <x-input id="licence_start_date" class="block mt-1 w-full" type="date" name="licence_start_date" :value="old('licence_start_date')" required />
          </div>

        </div>

        <x-button class="my-8 bg-indigo-500 hover:bg-indigo-700">Add new employee</x-button>

      </form>

    </div>
  </div>
</x-app-layout>
