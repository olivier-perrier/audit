<?php

namespace Database\Seeders;

use App\Models\ScoringQuestion;
use App\Models\ScoringQuiz;
use App\Models\ScoringSection;
use Illuminate\Database\Seeder;

class ScoringQuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $SCORING = [
            'title' => '',
            'sections' => [
                [
                    'title' => 'Pilotage stratégique',
                    'icon' => 'images/icon_section_gouvernance.png',
                    'questions' => [
                        [
                            'label' => "Concrètement, dans votre organisation, la stratégie portée par la direction intègre-t-elle un engagement explicite pour préserver l'employabilité et le maintien en poste des salariés seniors ?",
                            'points' => 2,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, disposez-vous d'un référentiel d'objectifs fondé sur les normes internationales (ONU, OIT, OMS) et les meilleures pratiques françaises pour soutenir l'activité des salariés seniors ?",
                            'points' => 2,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, une personne (Comex) et/ou une structure est-elle officiellement responsable de cet engagement envers les seniors, avec des missions et indicateurs clairement formalisés ?',
                            'points' => 3,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les principes de non-discrimination, d'égalité de traitement et de promotion de l'activité des seniors sont-ils inscrits dans la RSE, le code de conduite ou la charte éthique ?",
                            'points' => 4,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, un document interne recense-t-il les obligations et engagements sur ce sujet (ES), puis est-il effectivement diffusé aux collaborateurs, managers, RH et membres du CSE ?',
                            'points' => 4,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, existe-t-il un règlement ou document interne qui liste formellement les obligations et engagements liés à ce sujet (ES) ?',
                            'points' => 4,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, ce document est-il transmis de manière claire aux collaborateurs, managers, RH et membres du CSE ?',
                            'points' => 4,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des accords collectifs liés à l'ES ont-ils été conclus (gestion des seniors, accord de génération, maintien dans l'emploi, charte d'engagements, etc.) ?",
                            'points' => 2,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, ces accords sont-ils réellement pilotés avec un suivi et une évaluation de leur mise en application ?',
                            'points' => 2,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des moyens humains et financiers dédiés à l'ES sont-ils identifiés, y compris une enveloppe budgétaire spécifique pour les salariés seniors ?",
                            'points' => 2,
                        ],
                    ],
                ],
                [
                    'title' => 'Conformité légale',
                    'icon' => 'images/icon_section_reglementation.png',
                    'questions' => [[
                        'label' => "Concrètement, dans votre organisation, le Document Unique d'Evaluation des Risques est-il actualisé régulièrement (au moins une fois par an) sur les enjeux d'ES, notamment de santé physique et psychologique ?",
                        'points' => 2,
                    ], [
                        'label' => "Concrètement, dans votre organisation, une majoration des indemnités de licenciement sans faute est-elle prévue lorsqu'un salarié de plus de 50 ans est concerné ?",
                        'points' => 2,
                    ], [
                        'label' => "Concrètement, dans votre organisation, le financement de l'outplacement est-il pris en charge pour les salariés de plus de 50 ans ?",
                        'points' => 1,
                    ], [
                        'label' => "Concrètement, dans votre organisation, des actions ciblées existent-elles pour réduire l'absentéisme des salariés de plus de 50 ans ?",
                        'points' => 1,
                    ]],
                ],
                [
                    'title' => 'Information et sensibilisation',
                    'icon' => 'images/icon_section_communication.png',
                    'questions' => [
                        [
                            'label' => "Concrètement, dans votre organisation, les rapports publics (DEU, rapport annuel, bilan social/ESG/ODD, etc.) rendent-ils compte de manière régulière et précise des engagements pris en faveur de l'ES ?",
                            'points' => 8,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, les engagements ES sont-ils formalisés puis communiqués à la direction (Comex, Codir, CA), aux managers, aux collaborateurs et aux représentants du personnel ?',
                            'points' => 2,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un dispositif permet-il de vérifier que les engagements ES sont effectivement connus de l'ensemble des publics internes ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des moyens concrets sont-ils mobilisés pour sensibiliser les collaborateurs aux enjeux de l'ES ?",
                            'points' => 2,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, les parties prenantes externes (clients, fournisseurs, etc.) sont-elles informées des engagements ES et associées au dialogue ?',
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, lorsque vous animez un campus ou une académie, la thématique ES est-elle intégrée aux contenus de formation proposés ?',
                            'points' => 1,
                        ],
                    ],
                ],
                [
                    'title' => 'Gestion des parcours professionnels',
                    'icon' => 'images/icon_section_politique.png',
                    'questions' => [
                        [
                            'label' => 'Concrètement, dans votre organisation, les engagements ES sont-ils contractualisés avec les représentants du personnel élus au CSE ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, une procédure claire définit-elle les principes et règles garantissant la non-discrimination et la promotion de l'activité des seniors (audit, carrière, formation, santé, tutorat, reconversion, GEPP, accords sociaux, mobilité, prévention des risques, etc.) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, le dispositif de risk management intègre-t-il les risques de discrimination et les engagements liés à l'égalité de traitement des seniors ?",
                            'points' => 2,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les sujets de préservation et de promotion des salariés seniors figurent-ils à l'ordre du jour du CSE et du CA ?",
                            'points' => 2,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, des indicateurs ES sont-ils définis puis suivis dans le temps (part des seniors, pyramide des âges, démissions, licenciements, mobilité, formation, litiges, distinctions, candidatures seniors et motifs de rejet, etc.) ?',
                            'points' => 2,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, ces indicateurs sont-ils publiés dans les rapports sociaux ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un audit de contrôle vérifie-t-il l'application effective des procédures ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, un référent GEPP dédié aux salariés seniors existe-t-il (formation, audit, fidélisation, rémunération, etc.) ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, la gestion des carrières et la politique de rémunération sont-elles garanties sans discrimination, notamment liée à l'âge ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, l'accès à l'ensemble des postes du Groupe, quel que soit le niveau de responsabilité, est-il ouvert sans critère d'âge ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, la proportion de salariés seniors bénéficiant d'augmentations individuelles est-elle comparable à celle des salariés plus jeunes ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, le montant moyen des augmentations individuelles accordées aux seniors est-il similaire à celui des salariés plus jeunes ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des services d'orientation professionnelle aident-ils les seniors à analyser leurs perspectives, leurs compétences et leurs opportunités afin de construire un plan de développement jusqu'à la retraite ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, une politique structurée d'emplois aidés pour les seniors est-elle en place (CDI d'employabilité, aides au audit des plus de 45 ans en contrat de professionnalisation, etc.) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, le salarié senior bénéficie-t-il d'un bilan de compétences adapté, puis d'un accompagnement pour concrétiser son projet professionnel, personnel et/ou de formation ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les collaborateurs peuvent-ils accéder à un temps partiel conditionnel durant leurs dernières années d'activité ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, un dispositif de crédit-temps permet-il aux salariés de 55 ans et plus de passer à mi-temps avec compensation salariale via les jours de congé ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les collaborateurs seniors bénéficient-ils d'un entretien spécifique pour préparer la dernière phase de carrière ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un accompagnement externe au reclassement est-il financé pour les seniors (soutien psychologique, bilan, recherche d'emploi, négociation, intégration, appui administratif et logistique) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, le collaborateur senior peut-il exercer une partie de son activité en télétravail selon un cadre fixe ou flexible validé avec la DRH et le manager ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un dispositif de temps partiel senior favorise-t-il le transfert de compétences et d'expertises clés vers les juniors, nouveaux embauchés ou déjà en poste ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des aides à la création d'activité existent-elles (entreprise interne, entrepreneuriat, intrapreneuriat, incubateur interne) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les détachements de salariés seniors vers d'autres entreprises sont-ils accompagnés ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un collaborateur senior peut-il acquérir une nouvelle expérience via des missions externes, humanitaires ou autres, auprès d'une ONG partenaire (mécénat de compétences) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les salariés seniors peuvent-ils intervenir en formation interne, notamment pour internaliser des formations auparavant confiées à l'externe ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, un collaborateur senior expérimenté peut-il obtenir un rôle de référent pour transmettre valeurs, règles, usages et bonnes pratiques aux jeunes salariés ?',
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, les seniors sont-ils prioritairement mobilisés pour tutorer les jeunes en alternance (contrat pro, apprentissage, doctorants, stages longs), avec une formation préalable au tutorat ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, la constitution de binômes seniors/juniors au sein d'un même atelier ou service fait-elle l'objet d'une attention particulière ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les salariés seniors ont-ils la possibilité d'assurer des missions de formation en dehors de l'entreprise (AFPA, AFPI, dispositif \"passerelle\", etc.) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un \"bilan retraite\" financé par l'entreprise est-il proposé aux seniors pour clarifier les dispositifs applicables et les démarches de liquidation de pension ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les collaborateurs proches de la retraite bénéficient-ils d'un parcours structuré de préparation et d'accompagnement de fin de carrière ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un collaborateur en fin de carrière peut-il bénéficier d'horaires individualisés pour alléger progressivement son activité avant la retraite ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les salariés peuvent-ils anticiper leur départ à la retraite au moyen d'un congé bloqué abondé par l'entreprise ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, la retraite progressive est-elle autorisée pour réduire le temps de travail jusqu'au départ, avec un impact financier limité ?",
                            'points' => 1,
                        ],
                        [
                            'label' => 'Concrètement, dans votre organisation, le rachat de trimestres manquants est-il envisagé pour faciliter le départ à la retraite des collaborateurs ?',
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, un réseau d'Alumni ou de retraités permet-il aux collaborateurs partant à la retraite de conserver un lien avec l'entreprise ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, la GEPP intègre-t-elle une gestion spécifique de l'âge (notamment des seniors) pour adapter emplois, effectifs et compétences aux évolutions stratégiques, économiques, technologiques, sociales et juridiques ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, des objectifs chiffrés sont-ils fixés pour maintenir une part de salariés seniors en CDI parmi l'ensemble des CDI ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, le taux d'activité des salariés seniors (50 ans et plus / effectif total) est-il mesuré puis piloté ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, existe-t-il un outil d'évaluation spécifique pour la performance, les compétences, les réalisations et la contribution des salariés seniors ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, le taux de mobilité des salariés de 50 ans et plus est-il mesuré (rapporté au total des salariés ayant bénéficié d'une mobilité) ?",
                            'points' => 1,
                        ],
                        [
                            'label' => "Concrètement, dans votre organisation, les managers sont-ils évalués sur des objectifs liés aux enjeux du management de l'ES ?",
                            'points' => 1,
                        ],
                    ],
                ],
                [
                    'title' => 'Attraction des talents',
                    'icon' => 'images/icon_section_audit.png',
                    'questions' => [[
                        'label' => "Concrètement, dans votre organisation, l'évolution de ces indicateurs est-elle suivie et utilisée pour ajuster la politique d'audit ?",
                        'points' => 9,
                    ], [
                        'label' => "Concrètement, dans votre organisation, les offres d'emploi excluent-elles les formulations liées à l'âge et privilégient-elles des formats qui valorisent compétences et expériences plutôt que des CV strictement chronologiques ?",
                        'points' => 3,
                    ], [
                        'label' => "Concrètement, dans votre organisation, les premiers entretiens sont-ils menés \"à l'aveugle\" (par téléphone plutôt qu'en face-à-face) pour limiter les biais inconscients ?",
                        'points' => 1,
                    ]],
                ],
                [
                    'title' => 'Développement des compétences',
                    'icon' => 'images/icon_section_formation.png',
                    'questions' => [[
                        'label' => "Concrètement, dans votre organisation, la politique de formation professionnelle répond-elle aux besoins spécifiques de maintien dans l'emploi des seniors (formations, accompagnements, coachings pour acquérir, maintenir ou renforcer les compétences face aux évolutions d'organisation, de méthodes et de technologies) ?",
                        'points' => 5,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, les salariés seniors ont-ils accès à des formations dédiées aux nouvelles technologies ?',
                        'points' => 4,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, une formation en ligne est-elle proposée aux collaborateurs et managers pour traiter les situations défavorables aux seniors, avec des réponses et recommandations managériales adaptées ?',
                        'points' => 4,
                    ], [
                        'label' => "Concrètement, dans votre organisation, le taux d'heures de formation suivi par les salariés de 50 ans et plus est-il mesuré et piloté par rapport au volume total de formation ?",
                        'points' => 2,
                    ], [
                        'label' => "Concrètement, dans votre organisation, les salariés seniors bénéficient-ils d'une communication ciblée et d'un accompagnement spécifique pour leurs démarches de VAE ?",
                        'points' => 2,
                    ]],
                ],
                [
                    'title' => 'Qualité de vie au travail',
                    'icon' => 'images/icon_section_bienetre.png',
                    'questions' => [[
                        'label' => "Concrètement, dans votre organisation, la médecine du travail met-elle en place un suivi spécifique des seniors, notamment via l'observatoire EVREST, pour analyser le ressenti sur la santé et les conditions de travail ?",
                        'points' => 1,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, une comparaison de la situation de santé entre salariés seniors et autres salariés est-elle réalisée ?',
                        'points' => 1,
                    ], [
                        'label' => "Concrètement, dans votre organisation, une démarche ergonomique continue sur les postes et équipements est-elle conduite afin de rester compatible avec l'évolution des capacités physiques des seniors ?",
                        'points' => 2,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, des programmes de santé et de bien-être adaptés aux besoins des travailleurs seniors existent-ils (activité physique adaptée, massage, sophrologie, etc.) ?',
                        'points' => 1,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, le CSE et le CCSCT sont-ils consultés au moins annuellement sur les conditions de travail et la pénibilité des emplois occupés par les seniors ?',
                        'points' => 1,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, après une maladie, des parcours de reprise progressive adaptés aux seniors sont-ils proposés (évaluations personnalisées, tâches autorisées, adaptations, formation, aménagement des conditions de travail, etc.) ?',
                        'points' => 1,
                    ], [
                        'label' => "Concrètement, dans votre organisation, des enquêtes de satisfaction intègrent-elles des points d'attention spécifiques relatifs aux salariés seniors ?",
                        'points' => 2,
                    ]],
                ],
                [
                    'title' => 'Coopération intergénérationnelle',
                    'icon' => 'images/icon_section_intergenerationnel.png',
                    'questions' => [[
                        'label' => 'Concrètement, dans votre organisation, une politique RH intergénérationnelle est-elle réellement déployée ?',
                        'points' => 3,
                    ], [
                        'label' => "Concrètement, dans votre organisation, des campagnes et événements sensibilisent-ils cadres et employés à l'importance d'une politique seniors et au renforcement de la coopération entre générations ?",
                        'points' => 3,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, un dispositif de mentoring est-il ouvert à toute personne qui en fait la demande, et pas uniquement aux hauts potentiels ?',
                        'points' => 2,
                    ], [
                        'label' => 'Concrètement, dans votre organisation, un programme de reverse mentoring (transmission bidirectionnelle junior <=> senior) est-il accessible à tous les volontaires ?',
                        'points' => 1,
                    ], [
                        'label' => "Concrètement, dans votre organisation, du temps formel et informel est-il dédié au partage des compétences entre salariés d'âges et d'expériences différents (codéveloppement) ?",
                        'points' => 1,
                    ]],
                ],
            ],
        ];

        $scoringQuiz = ScoringQuiz::factory()
            ->create(['name' => 'Score d\'audit']);

        foreach ($SCORING['sections'] as $key => $SECTION) {

            $section = [];
            $section['title'] = $SECTION['title'];
            $section['sort'] = $key + 1;
            if (isset($SECTION['icon'])) {
                $section['icon'] = $SECTION['icon'];
            }

            $scoringSection = ScoringSection::factory()
                ->for($scoringQuiz)
                ->create($section);

            foreach ($SECTION['questions'] as $key => $QUESTION) {

                ScoringQuestion::factory()
                    ->for($scoringSection)
                    ->create([
                        'question' => $QUESTION['label'],
                        'points' => $QUESTION['points'],
                        'sort' => $key + 1,
                    ]);
            }
        }
    }
}
