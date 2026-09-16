@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="p-10">

    {{-- header --}}
    <div class="relative items-center">
        <div class="w-full h-1/2">
            <img src="{{ asset('images/header-2.jpg') }}" alt="header" class="w-full h-full object-cover rounded">
        </div>

        <div class="flex w-2/3 text-5xl font-extrabold italic rounded-xl bg-slate-100 p-4 absolute bottom-0 left-0 m-8">
            <x-h1>LA FÉDÉRATION POUR UN <span class="text-orange-600">MEILLEURE AUDIT</span></x-h1>
        </div>
    </div>

    {{-- Certification --}}
    <div class="pt-10" id="scoring">
        <x-h1>LA CERTIFICATION <span class="text-orange-600">d'AUDIT</span>
        </x-h1>

        <div class="mx-auto max-w-4xl mt-6">

            <x-card class="col-span-2">
                <x-slot name="header">Vous avez validé votre certification</x-slot>

                <div>
                    <div class="flex justify-between">
                        <img src="{{ asset('images/logo-full.png') }}" alt="" class="h-16">
                        <img src="{{ asset('images/certified.jpg') }}" alt="" class="h-20">
                    </div>

                    <div class="my-20 text-center">
                        <h1 class="text-4xl font-bold">{{auth()->user()->company->name}}</h1>
                        {{-- <h2 class="text-green-700">Certifié rand <b>{{ $scoring->rank }}</b></h2> --}}
                    </div>
                    <div class="text-center text-sm text-gray-500">
                        <span>Société <b>{{auth()->user()->company->name}}</b> domicilié à l'adresse
                            <b>{{auth()->user()->company->address->city}}</b>
                            certifié rand <b>{{ $scoring->rank }}</b></span> <br>
                        <hr class="my-2">
                        <span>Votre certification est validée à la date du {{ date('Y-m-d') }} sous la
                            responsabilité de
                            l'ossociation et en collboration avec l'entreprise Opart tout droit réservé.</span>
                        <br>
                        <span>Merci de lire en prendre connaissance des conditions générales d'utilisations. En
                            utilisant
                            cette certification vous acceptez les conditions et vous engagez à les respecter.</span>
                    </div>
                </div>

            </x-card>

        </div>
    </div>

    {{-- scoring --}}
    <div class="mt-10"> 

        <x-h2><span class="text-gray-800">ANALYSE DU</span> AUDIT</x-h2>
        <span class="text-sm italic">Vous avez obtenu un pourcentage de total de {{ $scoring->score }} soit
            {{ $scoring->score_pourcentage }}%</span></span>

        {{-- Result summary --}}
        <div class="mt-6">
            @include('scoring.partials.certification-details', $scoring)
        </div>

    </div>

    {{-- iframe code --}}
    <div class="mt-10">
        <x-h2><span class="text-gray-800">Intégration</span> de votre certification</x-h2>
        <span class="italic">Copier le texte ci dessous et intégrez le sur votre propre page web</span>

        <div class="grid grid-cols-2 gap-10">
            <div class="mt-10">
                <p class="text-sm">Texte à copier</p>
                <textarea class="textarea textarea-bordered w-full" readonly><iframe src="{{ route('scorings.iframe', $scoring) }}" frameborder="0" width="100%"></iframe></textarea>
            </div>
            <div class="">
                <span class="text-sm">Prévisualisation</span>
                <iframe src="{{ route('scorings.iframe', $scoring) }}" frameborder="0" width="100%"></iframe>
            </div>
        </div>
    </div>

</div>
