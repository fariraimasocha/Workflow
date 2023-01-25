
    <x-guest-layout>
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="grid lg:grid-cols-4 gap-y-6">
    
                @foreach ($project->steps as $step)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="/images/office.jpg"alt="Image"/>
                    <div class="px-6 py-4">
                      <div class="flex mb-2">
                        <span class="px-4 py-0.5 text-sm bg-pink-500 rounded-full text-pink-50">{{ $step->name}}</span>
                      </div>
                      <div class="flex mb-2">
                        <span class="px-4 py-0.5 text-sm bg-pink-500 rounded-full text-pink-50">{{ $step->id}}</span>
                      </div>
                      <a href="{{ route('projects.show', $step->status) }}">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600  hover:text-green-400 uppercase">
                            {{$step->status}}</h4>
                      </a>
                    </div>
                </div>
           
                @endforeach
            </div>
    </x-guest-layout>
