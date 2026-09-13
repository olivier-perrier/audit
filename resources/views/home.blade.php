<x-guest-layout>

    <x-slot name="header">
        <span class="text-shadow-md">
            Auditez votre système informatique
        </span>
    </x-slot>
    
    <x-container>

        <div class="mx-auto max-w-4xl">
            <p class="text-center">L'outil <b>d'audit</b> permet aux entreprises d'évaluer
                l'ensemble des leviers d'amélioration en matière de système d'information. Il positionne leurs résultats
                par rapport aux autres entreprises de leur secteur d'activité ou de leur taille. Les critères évalués
                s'inscrivent dans les référentiels Environnementaux, Sociaux et de Gouvernance (ESG) ainsi que dans les
                Objectifs de Développement Durable (ODD).</p>

            <div class="text-center mt-4 space-y-2">

                <p>À l'image d'un audit de sécurité qui renseigne sur la qualité d'un produit, l'outil d'analyse
                    <b>d'audit</b> évalue et qualifie l'ensemble de vos système et l'engagement d'une entreprise en faveur de
                    sa pérénité.
                </p>
                <p>
                    Il offre une évaluation transparente des actions et des initiatives mises en place dans une
                    démarche professionnelle.
                </p>
                <p>
                    L'outil d'analyse <b>d'audit</b> vous permet de valoriser votre engagement et de mettre en avant vos actions concrètes en matière de système d'information.
                </p>
            </div>
        </div>

        {{-- Themes --}}
        <div class="mt-10 max-w-7xl mx-auto text-center sm:px-6 lg:px-8">
            <x-h1 class="uppercase text-4xl">{{ $sections->count() }} audits</x-h1>

            <div class="mt-6 grid md:grid-cols-2 lg:grid-cols-4 gap-4">

                @foreach ($sections as $section)
                    <x-card.theme :title="$section->title" :icon="$section->icon" />
                @endforeach

            </div>

            <a href="{{ route('dashboard') }}">
                <x-primary-button class="mt-6">
                    Lancer mon audit
                </x-primary-button>
            </a>
        </div>

    </x-container>
    
</x-guest-layout>
