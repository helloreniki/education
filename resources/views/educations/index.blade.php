<x-app-layout>

  <!-- This example requires Tailwind CSS v2.0+ -->
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Educations</h1>
        <p class="mt-2 text-sm text-gray-700">A list of all educations for this company. Past and upcoming.</p>
      </div>

      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <a href="{{ route('educations.create') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add new education</a>
      </div>
    </div>

    {{-- Table --}}
    <div class="mt-8 flex flex-col">
      <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Title</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Organiser</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">City</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Credits</th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                    <span class="sr-only">Edit</span>
                    <span class="sr-only">Delete</span>
                  </th>
                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6"> <span class="sr-only">Apply</span></th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 bg-white">
                @foreach ($educations as $education)
                  <tr>
                    <td class="whitespace-pre   py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $education->title }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->organiser->name }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->date->format('d. M Y') }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $education->city }}</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $education->price }} €</td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-center">{{ $education->credits }}</td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">E</a>
                      <a href="#" class="text-red-600 hover:text-red-700">Delete</a>
                    </td>
                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                      @if ($education->date > now())
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Apply</a>
                      @endif
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <div class="mt-3">
            {{ $educations->links() }}
          </div>

        </div>
      </div>



    </div>
  </div>
</x-app-layout>
