<?php

namespace Database\Seeders;

use App\Enums\QuestionImpact;
use App\Enums\QuestionPriority;
use App\Enums\QuestionProbability;
use App\Enums\QuestionSeverity;
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
            'name' => 'Score d\'audit',
            'description' => 'Ce questionnaire permet d\'évaluer le niveau de maturité de l\'entreprise en matière de cybersécurité. '
                . 'Il est composé de plusieurs sections couvrant les principaux aspects de la sécurité de l\'information.',
            'sections' => [
                [
                    'title' => 'Gouvernance et politique de sécurité',
                    'default_icon' => 'images/sections/gouvernance.jpg',
                    'questions' => [[
                        'label' => "L'entreprise dispose-t-elle d'une politique de sécurité de l'information formalisée, validée par la direction et régulièrement mise à jour ?",
                        'severity' => QuestionSeverity::Critical,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Absence de cadre de sécurité cohérent, décisions incohérentes et risques non maîtrisés.",
                        'priority' => QuestionPriority::P1,
                        'points' => 2,
                    ], [
                        'label' => "Les rôles et responsabilités en matière de sécurité sont-ils clairement définis et attribués ?",
                        'severity' => QuestionSeverity::High,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Manque de responsabilité, retards dans le traitement des incidents et contrôles insuffisants.",
                        'priority' => QuestionPriority::P2,
                        'points' => 2,
                    ], [
                        'label' => "Une analyse des risques de sécurité est-elle réalisée et actualisée régulièrement ?",
                        'severity' => QuestionSeverity::Critical,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Menaces majeures non identifiées, vulnérabilités non traitées et pertes financières potentielles.",
                        'priority' => QuestionPriority::P1,
                        'points' => 1,
                    ], [
                        'label' => "Les employés et les dirigeants sont-ils sensibilisés aux risques de cybersécurité et aux bonnes pratiques ?",
                        'severity' => QuestionSeverity::High,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Phishing, erreurs humaines, fuite de données et compromission des comptes.",
                        'priority' => QuestionPriority::P2,
                        'points' => 1,
                    ], [
                        'label' => "L'entreprise suit-elle des indicateurs de sécurité et réalise-t-elle des revues périodiques pour vérifier l'efficacité des mesures en place ?",
                        'severity' => QuestionSeverity::Medium,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Faible visibilité sur les risques, détection tardive des faiblesses et amélioration continue insuffisante.",
                        'priority' => QuestionPriority::P2,
                        'points' => 1,
                    ]],
                ],
                [
                    'title' => 'Sécurité des ressources humaines',
                    'default_icon' => 'images/sections/security.jpg',
                    'questions' => [[
                        'label' => "Les collaborateurs sont-ils sensibilisés régulièrement aux risques de cybersécurité, notamment au phishing, aux mots de passe et à l’ingénierie sociale ?",
                        'severity' => QuestionSeverity::High,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Compromission de comptes, fuite de données, fraude et infection par un logiciel malveillant.",
                        'priority' => QuestionPriority::P1,
                        'points' => 2,
                    ], [
                        'label' => "Des vérifications adaptées aux postes occupés sont-elles effectuées lors du recrutement, dans le respect de la réglementation applicable ?",
                        'severity' => QuestionSeverity::Medium,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Recrutement inadapté, risques de fraude et accès accordés à des personnes insuffisamment vérifiées.",
                        'priority' => QuestionPriority::P3,
                        'points' => 2,
                    ], [
                        'label' => "Les obligations de confidentialité et les responsabilités en matière de sécurité sont-elles formalisées et communiquées aux collaborateurs ?",
                        'severity' => QuestionSeverity::High,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Divulgation d’informations sensibles, mauvaise manipulation des données et difficultés à faire respecter les règles internes.",
                        'priority' => QuestionPriority::P2,
                        'points' => 1,
                    ], [
                        'label' => "Les accès informatiques des collaborateurs sont-ils adaptés à leurs fonctions et mis à jour lors d’un changement de poste ou de responsabilités ?",
                        'severity' => QuestionSeverity::Critical,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Accès excessifs, modification non autorisée de données et élévation de privilèges.",
                        'priority' => QuestionPriority::P1,
                        'points' => 1,
                    ], [
                        'label' => "Lors du départ d’un collaborateur, les comptes, badges, équipements et accès distants sont-ils révoqués dans les délais prévus ?",
                        'severity' => QuestionSeverity::Medium,
                        'probability' => QuestionProbability::Medium,
                        'impact' => "Accès persistant aux systèmes, vol de données, sabotage ou utilisation frauduleuse des ressources de l’entreprise.",
                        'priority' => QuestionPriority::P1,
                        'points' => 1,
                    ]],
                ],
                [
                    'title' => 'Sécurité des systèmes et du réseau',
                    'default_icon' => 'images/sections/system_security.jpg',
                    'questions' => [
                        [
                            'label' => "Les systèmes d'exploitation, logiciels, serveurs et équipements réseau sont-ils régulièrement mis à jour afin de corriger les vulnérabilités de sécurité connues ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Exploitation de vulnérabilités connues, compromission des systèmes, installation de logiciels malveillants et interruption des activités.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les accès au réseau de l'entreprise sont-ils protégés par des pare-feu correctement configurés et des règles de filtrage régulièrement révisées ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Intrusions depuis l'extérieur, accès non autorisés aux ressources internes, propagation d'attaques et compromission des données sensibles.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les postes de travail et les serveurs disposent-ils d'une protection active contre les logiciels malveillants, avec des mises à jour et une surveillance régulières ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::High,
                            'impact' => "Infection par des logiciels malveillants, propagation de rançongiciels, perte de données et indisponibilité des systèmes.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                        [
                            'label' => "Le réseau informatique est-il segmenté afin de limiter les communications entre les postes utilisateurs, les serveurs, les équipements sensibles et les réseaux invités ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Propagation latérale d'une attaque, accès non autorisé aux systèmes critiques et aggravation des conséquences d'une compromission initiale.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "L'entreprise réalise-t-elle régulièrement des analyses de vulnérabilités sur ses systèmes et équipements réseau, puis suit-elle la correction des failles identifiées ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Maintien de failles de sécurité non détectées, exposition prolongée aux attaques et augmentation des coûts de remédiation.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                    ],
                ],
                [
                    'title' => 'Gestion des identités et des accès',
                    'default_icon' => 'images/sections/identity.jpg',
                    'questions' => [
                        [
                            'label' => "L'authentification multifacteur (MFA) est-elle activée pour les comptes sensibles, les accès à distance et les comptes administrateurs ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Compromission de comptes à la suite du vol de mots de passe, accès frauduleux aux systèmes sensibles et fuite de données confidentielles.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les droits d'accès des utilisateurs sont-ils attribués selon le principe du moindre privilège et limités aux ressources nécessaires à leurs fonctions ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Accès non autorisé à des informations sensibles, modification ou suppression de données et augmentation des possibilités d'abus de privilèges.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les comptes utilisateurs, administrateurs et comptes de service sont-ils recensés, individualisés et contrôlés afin d'éviter les comptes partagés ou orphelins ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Difficulté à identifier l'auteur d'une action, maintien d'accès non autorisés et risque d'utilisation abusive de comptes oubliés ou partagés.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Les droits d'accès sont-ils révisés périodiquement et immédiatement ajustés lors des changements de fonction, mutations ou départs des collaborateurs ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Conservation de privilèges excessifs, accès d'anciens collaborateurs et exposition des systèmes à des modifications ou consultations non autorisées.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                        [
                            'label' => "Les comptes à privilèges sont-ils protégés par des mesures renforcées, notamment une utilisation dédiée, une traçabilité des actions et une surveillance des connexions ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Prise de contrôle de systèmes critiques, désactivation des protections de sécurité, altération des journaux et compromission généralisée du système d'information.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                    ],
                ],
                [
                    'title' => 'Protection des données et confidentialité',
                    'default_icon' => 'images/sections/data.jpg',
                    'questions' => [
                        [
                            'label' => "Les données de l'entreprise sont-elles classifiées selon leur niveau de sensibilité et leur criticité afin d'adapter les mesures de protection ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Protection inadaptée des informations sensibles, divulgation de données confidentielles et exposition accrue aux risques de fuite ou d'utilisation abusive.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Les données sensibles et les données personnelles sont-elles chiffrées lors de leur stockage et de leur transmission lorsque cela est nécessaire ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Divulgation de données confidentielles en cas de vol d'équipement, d'interception des communications ou d'accès non autorisé aux systèmes.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "L'entreprise applique-t-elle des règles de conservation et de suppression des données conformes aux obligations légales et aux besoins opérationnels ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Conservation excessive de données, augmentation des conséquences d'une fuite, non-respect des obligations réglementaires et coûts supplémentaires de stockage.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Les accès aux données personnelles et confidentielles sont-ils limités aux personnes autorisées et font-ils l'objet de contrôles réguliers ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Consultation, extraction, modification ou divulgation non autorisée de données, avec des conséquences financières, juridiques et réputationnelles.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "L'entreprise dispose-t-elle de procédures pour gérer les violations de données, évaluer leurs conséquences et effectuer les notifications réglementaires nécessaires ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Retard dans la maîtrise d'une fuite de données, aggravation du préjudice subi par les personnes concernées, sanctions réglementaires et perte de confiance des clients.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                    ],
                ],
                [
                    'title' => 'Sauvegarde, continuité et reprise d\'activité',
                    'default_icon' => 'images/sections/backup.jpg',
                    'questions' => [
                        [
                            'label' => "L'entreprise réalise-t-elle des sauvegardes régulières des données et des systèmes critiques, selon une fréquence adaptée à leur importance et aux besoins métier ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Perte définitive de données, interruption prolongée des activités et difficultés à restaurer les services essentiels après une panne, une erreur humaine ou une cyberattaque.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les sauvegardes sont-elles protégées contre les modifications, les suppressions et les rançongiciels, notamment grâce à des copies isolées ou immuables ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Chiffrement ou destruction simultanée des données de production et des sauvegardes, rendant la restauration impossible ou fortement retardée.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Des tests de restauration sont-ils effectués régulièrement afin de vérifier l'intégrité des sauvegardes et la capacité à récupérer les données et les systèmes ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Découverte tardive de sauvegardes inutilisables ou incomplètes, allongement des délais de reprise et perte de données lors d'un incident majeur.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                        [
                            'label' => "L'entreprise dispose-t-elle d'un plan de continuité d'activité (PCA) documenté, régulièrement actualisé et testé pour maintenir les activités essentielles en cas d'incident ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Désorganisation des opérations, indisponibilité des services essentiels, retards de livraison et pertes financières lors d'une crise.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "L'entreprise dispose-t-elle d'un plan de reprise d'activité (PRA) définissant les responsabilités, les procédures de restauration et les objectifs de délai et de perte de données acceptables (RTO et RPO) ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Reprise tardive ou désordonnée des systèmes informatiques, dépassement des durées d'interruption acceptables et perte de données supérieure aux objectifs métier.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                    ],
                ],
                [
                    'title' => 'Détection et gestion des incidents',
                    'default_icon' => 'images/sections/issues.jpg',
                    'questions' => [
                        [
                            'label' => "L'entreprise centralise-t-elle et surveille-t-elle les journaux d'événements de sécurité de ses systèmes, serveurs, équipements réseau et applications critiques ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::High,
                            'impact' => "Détection tardive des activités suspectes, difficulté à reconstituer les événements et prolongation d'une compromission du système d'information.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                        [
                            'label' => "Des mécanismes de détection sont-ils en place pour identifier les comportements anormaux, les tentatives d'intrusion, les connexions suspectes et les infections par des logiciels malveillants ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Intrusion non détectée, propagation d'une attaque, vol de données et compromission prolongée des systèmes critiques.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "L'entreprise dispose-t-elle d'une procédure formalisée de gestion des incidents précisant les rôles, les responsabilités, les étapes de traitement et les modalités d'escalade ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Réaction désorganisée, retards dans le confinement de l'incident, aggravation des dommages et manque de coordination entre les équipes.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Les incidents de sécurité sont-ils enregistrés, qualifiés selon leur gravité, priorisés et suivis jusqu'à leur résolution complète ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Incidents non traités ou récurrents, absence de traçabilité, mauvaise allocation des ressources et persistance de vulnérabilités exploitables.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Après chaque incident significatif, l'entreprise réalise-t-elle une analyse des causes, documente-t-elle les enseignements tirés et met-elle en œuvre des actions correctives ?",
                            'severity' => QuestionSeverity::Medium,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Répétition d'incidents similaires, maintien des faiblesses de sécurité et augmentation progressive des coûts opérationnels et financiers.",
                            'priority' => QuestionPriority::P3,
                            'points' => 6,
                        ],
                    ],
                ],
                [
                    'title' => 'Sécurité physique et gestion des prestataires',
                    'default_icon' => 'images/sections/providers.jpg',
                    'questions' => [
                        [
                            'label' => "L'accès aux locaux de l'entreprise, aux salles serveurs, aux armoires électriques et aux locaux sensibles est-il strictement contrôlé et limité au personnel autorisé ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Vol de matériel, accès non autorisé aux systèmes d'information, sabotage et perturbation des activités critiques.",
                            'priority' => QuestionPriority::P2,
                            'points' => 7,
                        ],
                        [
                            'label' => "Des dispositifs de vidéosurveillance sont-ils mis en place dans les zones sensibles et font-ils l'objet d'une surveillance et d'une conservation appropriées des enregistrements ?",
                            'severity' => QuestionSeverity::Medium,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Absence de preuves en cas d'incident, difficulté à identifier les intrus et persistance des menaces sans dissuasion efficace.",
                            'priority' => QuestionPriority::P3,
                            'points' => 6,
                        ],
                        [
                            'label' => "Les prestataires externes (maintenance, nettoyage, visiteurs, consultants) accédant aux locaux sont-ils identifiés, autorisés et accompagnés de manière appropriée ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Introduction de menaces externes, vol de données, sabotage ou installation de dispositifs malveillants par des tiers non autorisés.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Des contrats et accords de confidentialité (NDA) sont-ils établis avec les prestataires traitant des données sensibles de l'entreprise ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Divulgation non autorisée de données confidentielles, non-respect des obligations légales et atteinte à la réputation de l'entreprise.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "L'entreprise réalise-t-elle des audits réguliers de sécurité physique et des contrôles d'accès pour s'assurer de l'efficacité des mesures mises en place ?",
                            'severity' => QuestionSeverity::Low,
                            'probability' => QuestionProbability::Low,
                            'impact' => "Maintenance insuffisante des contrôles d'accès, vulnérabilités physiques non détectées et risque accru d'incidents de sécurité.",
                            'priority' => QuestionPriority::P3,
                            'points' => 4,
                        ],
                        [
                            'label' => "L'accès aux locaux de l'entreprise et aux zones sensibles, notamment les salles serveurs et les espaces d'archivage, est-il contrôlé et réservé aux personnes autorisées ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Intrusion physique, vol d'équipements, accès non autorisé aux données confidentielles et compromission directe du système d'information.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les équipements informatiques et les locaux critiques sont-ils protégés contre les risques physiques et environnementaux, notamment l'incendie, les dégâts des eaux, la chaleur et les coupures électriques ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Détérioration des équipements, perte de données, interruption prolongée des services informatiques et perturbation des activités de l'entreprise.",
                            'priority' => QuestionPriority::P1,
                            'points' => 10,
                        ],
                        [
                            'label' => "Les prestataires et fournisseurs ayant accès aux systèmes, aux locaux ou aux données de l'entreprise font-ils l'objet d'une évaluation de leurs risques de sécurité avant leur intervention ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Introduction de vulnérabilités par un tiers, accès non maîtrisé aux informations sensibles, compromission des systèmes et atteinte à la réputation de l'entreprise.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                        [
                            'label' => "Les accès physiques et informatiques accordés aux prestataires sont-ils limités à leurs missions, encadrés dans le temps et révoqués à la fin de leur intervention ou de leur contrat ?",
                            'severity' => QuestionSeverity::Critical,
                            'probability' => QuestionProbability::High,
                            'impact' => "Maintien d'accès externes non autorisés, exploitation de comptes tiers, vol de données et prise de contrôle de systèmes de l'entreprise.",
                            'priority' => QuestionPriority::P1,
                            'points' => 9,
                        ],
                        [
                            'label' => "Les contrats avec les prestataires précisent-ils les exigences de sécurité, les obligations de confidentialité, les modalités de signalement des incidents et les conditions de restitution ou de suppression des données en fin de contrat ?",
                            'severity' => QuestionSeverity::High,
                            'probability' => QuestionProbability::Medium,
                            'impact' => "Responsabilités mal définies en cas d'incident, divulgation de données, difficultés à faire appliquer les mesures de sécurité et risques juridiques ou réglementaires.",
                            'priority' => QuestionPriority::P2,
                            'points' => 8,
                        ],
                    ],
                ],
            ],
        ];

        $scoringQuiz = ScoringQuiz::factory()
            ->create([
                'name' => $SCORING['name'],
                'description' => $SCORING['description'],
            ]);

        foreach ($SCORING['sections'] as $key => $SECTION) {

            $section = [];
            $section['title'] = $SECTION['title'];
            $section['sort'] = $key + 1;
            if (isset($SECTION['default_icon'])) {
                $section['default_icon'] = $SECTION['default_icon'];
            }

            $scoringSection = ScoringSection::factory()
                ->for($scoringQuiz)
                ->create($section);

            foreach ($SECTION['questions'] as $question_key => $QUESTION) {

                ScoringQuestion::factory()
                    ->for($scoringSection)
                    ->create([
                        'question' => $QUESTION['label'],
                        'points' => $QUESTION['points'],
                        'severity' => isset($QUESTION['severity']) ? $QUESTION['severity'] : null,
                        'probability' => isset($QUESTION['probability']) ? $QUESTION['probability'] : null,
                        'impact' => isset($QUESTION['impact']) ? $QUESTION['impact'] : null,
                        'priority' => isset($QUESTION['priority']) ? $QUESTION['priority'] : null,
                        'sort' => $question_key + 1,
                    ]);
            }
        }
    }
}
