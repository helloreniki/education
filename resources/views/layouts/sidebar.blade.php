<div class="w-52 bg-white shadow-sm sm:rounded-lg py-4 flex flex-col">
  {{-- @dd(auth()->user()->permissions()->contains('can_manage_users')) --}}
  @can('manage_users')
    <a href="{{ route('employees.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-4 flex items-center text-base font-medium">
      <!-- Heroicon name: outline/users -->
      <svg class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
      Employees
    </a>
  @endcan
  <a href="{{ route('educations.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-4 flex items-center text-base font-medium">
    <!-- Heroicon name: outline/users -->
    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    Educations
  </a>
  <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-4 flex items-center text-base font-medium">
    <!-- Heroicon name: outline/users -->
    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    Departments
  </a>
  <a href="{{route('employee.show', ['user' => auth()->user()] ) }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-4 flex items-center text-base font-medium">
    <!-- Heroicon name: outline/users -->
    <svg class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
    </svg>
    My Educations
  </a>
  @can('approve')
    <a href="{{route('employee.education.index') }}" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-4 flex items-center text-base font-medium">
      <!-- Heroicon name: outline/users -->
      <svg class="text-gray-400 group-hover:text-gray-500 mr-4 flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
      Educations to Approve
    </a>
  @endcan
</div>
