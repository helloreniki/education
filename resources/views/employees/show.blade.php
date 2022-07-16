<x-app-layout>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $user->name }}</h1>
        <h1 class="text-lg font-semibold text-indigo-600">{{ $user->profession->name }}, <span>{{ $user->work_position->name }}</span></h1>
        <h1 class="text-md text-gray-900">{{ $user->address }}</h1>
        <h1 class="text-md text-gray-900">{{ $user->phone_number }}</h1>
        <h1 class="text-md text-gray-900">Email: {{ $user->email }}</h1>
        <h1 class="text-md text-gray-900 pb-4">Work Email: {{ $user->work_email }}</h1>
        <hr>
        <h1 class="text-md font-semibold text-gray-900 pt-4">Date of employment: <span class="font-normal ">{{ $user->date_of_employment->format('d.m.Y') }}</span></h1>
        <h1 class="text-md font-semibold text-gray-900">License number: <span class="font-normal">{{ $user->licence_number }}</span></h1>
        <h1 class="text-md font-semibold text-gray-900 pb-4">License start date: <span class="font-normal">{{ $user->licence_start_date->format('d.m.Y') }}</span></h1>
        <hr>

      </div>
    </div>

    @if ($userEducationsUpcoming->isNotEmpty())
      <h1 class="text-xl font-semibold text-gray-900 my-8">A list of all upcomming educations for {{ $user->name }}.</h1>

      {{-- Table of Upcomming Approved/Pending Educations --}}
      <div class="mt-8 flex flex-col">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
              <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Education</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Organiser</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Credits</th>
                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                  @foreach ($userEducationsUpcoming as $education)
                    <tr>
                      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $education->date->format('d.m.Y') }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->title }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->organiser->name }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->price }} €</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->credits }}</td>
                      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->pivot->approved ? 'Approved' : 'Pending' }}</td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    @endif


    <h1 class="text-xl font-semibold text-gray-900 my-8">A list of all educations {{ $user->name }} attended.</h1>

    {{-- Table of Past Attended Educations --}}
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Education</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Organiser</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Credits</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Certificate</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Upload</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($userEducationsPast as $education)
                  <tr>
                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $education->date->format('d.m.Y') }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->title }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->organiser->name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->price }} €</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->credits }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                      @if ($education->pivot->certificate)
                        <a href="{{ route('certificate.download', [$user, $education]) }}">Download</a>
                      @endif
                    </td>

                    <td class="text-sm text-gray-500">

                      <form action="{{ route('certificate.store', [$user,$education]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex mr-2">
                          <input type="file" name="certificate">
                          <x-button class="bg-indigo-600 hover:bg-indigo-700" type="submit">Save</x-button>
                        </div>
                        @error('certificate')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                      </form>

                    </td>

                  </tr>
                @empty
                <tr>
                  <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">No educations attended yet.</td>
                </tr>
                @endforelse

              </tbody>
            </table>
          </div>
          <div class="mt-3">
            {{ $userEducationsPast->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
