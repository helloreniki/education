<x-app-layout>
  <div class="px-4 sm:px-6 lg:px-8 py-6">
    <div class="sm: sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Educations To Be Approved</h1>
        <p class="mt-2 text-sm text-gray-700">List of all educations and employees that applied. </p>
      </div>

      <div class="my-8 space-y-6">
        @foreach ($educationsToApprove as $education)
          <div>
            <h1 class="text-lg font-semibold text-gray-900">{{ $education->title}}, {{ $education->date->format('d.m.Y G:i') }}</h1>
            <div>Price: {{ $education->price }} €</div>
            <div>Credits: {{ $education->credits }}</div>

            {{-- Table --}}
            <div class="mt-8 flex flex-col">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                  <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Employee Name</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Work Position</th>
                          <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Profession</th>
                          <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900 text-right">Approve?</th>
                        </tr>
                      </thead>

                      <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach ($education->users as $user)
                          <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ $user->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->work_position->name }}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->profession->name }}</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">

                              <div x-data="" class="flex items-center justify-end space-x-2">
                                <form action="{{ route('approve.store', ['user' => $user, 'education' => $education]) }}" method="POST">
                                  @csrf
                                  <x-button type="submit" @click="confirm('You will APPROVE {{ $user->name }} {{ $education->title }}? \nAre you sure?')" class="bg-indigo-600 hover:bg-indigo-900">Yes</x-button>
                                </form>
                                <form action="{{ route('approve.destroy', [$user, $education]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <x-button type="submit" @click="confirm('You will NOT APPROVE {{ $user->name }} {{ $education->title }}? \nAre you sure?')">No</x-button>
                                </form>

                              </div>

                            </td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div> {{-- End of Table --}}
          </div>
        @endforeach
      </div>

    </div>
  </div>
</x-app-layout>
