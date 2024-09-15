<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tenants') }}
            <x-link-button class="ml-4 float-right" href="{{ route('tenant.create')}}">Add Tenant</x-link-button>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}      
                    <div class="col-md-12">
                      <table class="table table-dark">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Domain</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($data as $item)
                                
                            <tr>
                              <th scope="row">{{ $loop->index+1 }}</th>
                              <td>{{ $item->name}}</td>
                              @foreach($item->domains as $domain)
                              <td>{{ $domain->domain}}{{$loop->last ? '': ','}}</td>
                              @endforeach
                              <td>{{$item->email}}</td>
                              <td>Action</td>
                            </tr>
                            @endforeach
                            
                          </tbody>
                        </table>
                  </div>             
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
