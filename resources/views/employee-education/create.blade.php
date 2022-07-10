<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900 mb-4">Application for {{ $education->title }}.</h1>
        <h1 class="text-md font-semibold text-gray-900"><span class="font-bold">City:</span> {{ $education->city }}</h1>
        <h1 class="text-md font-semibold text-gray-900"><span class="font-bold">Date:</span> {{ $education->date->format('d.m.Y') }}</h1>
        <h1 class="text-md font-semibold text-gray-900"><span class="font-bold">Start Hour:</span> {{ $education->date->format('G:i') }}</h1>
        <h1 class="text-md font-semibold text-gray-900"><span class="font-bold">Price:</span> {{ $education->price }} €</h1>
        <h1 class="text-md font-semibold text-gray-900"><span class="font-bold">Credits:</span> {{ $education->credits }}</h1>

        <form action="{{ route('employee.education.store', ['user' => $user, 'education' => $education]) }}" method="post" class="my-8">
          @csrf
          {{-- <x-input name="user_id" value="{{ $user->id }}" type="hidden" /> --}}
          <x-input name="education_id" value="{{ $education->id }}" type="hidden" />

          <x-button type="submit" class="bg-indigo-600 hover:bg-indigo-700">Apply for this education</x-button>
        </form>
      </div>
    </div>
  </div>
</x-app-layout>
