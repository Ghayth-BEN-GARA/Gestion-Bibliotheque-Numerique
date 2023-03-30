<!DOCTYPE html>
<html lang = "en">
    <head>
        @include("Layouts.head_site")
        <title>Aide | Bibliothèque</title>
    </head>
    @include("Layouts.body_type_mode")
        <div class = "wrapper">
            @include("Layouts.left_navbar")
            <div class = "content-page">
                <div class = "content">
                    @include("Layouts.top_navbar")
                    <div class = "container-fluid">
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "page-title-box">
                                    <div class = "page-title-right">
                                        <ol class = "breadcrumb m-0">
                                            <li class = "breadcrumb-item">
                                                <a href = "{{url('/dashboard')}}">Dashboard</a>
                                            </li>
                                            <li class = "breadcrumb-item active">Aide</li>
                                        </ol>
                                    </div>
                                    <h4 class = "page-title">Aide</h4>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                            <div class = "col-12">
                                <div class = "card">
                                    <div class = "card-body">
                                        <h4 class = "header-title">Aide</h4>
                                        <p class = "text-muted font-14">
                                            Vous avez des questions ? Vous cherchez des informations sur notre plate-forme ? Ici vous trouvez tout ce que vous avez besoin. Lisez attentivement les informations pour trouver ce que vous avez besoin.
                                        </p>
                                        <div class = "accordion custom-accordion" id = "custom-accordion-one">
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingOne">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseOne" aria-expanded = "true" aria-controls = "collapseOne">
                                                            Q. IPSAS
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseOne" class = "collapse" aria-labelledby = "headingOne" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Vingt années ou un peu plus, c'est peu dans la vie d'une institution mais c'est assez pour réussir à se démarquer des sentiers battus. Dans sa vision de la formation des cadres d'un continent (l'Afrique) en devenir, L'IPSAS s'est toujours proposé de réaliser un double objectif :
                                                            <li>Former un ingénieur à la page des nouvelles technologies.</li>
                                                            <li>Lui donner des capacités de réaction et d'adaptation à des situations où souvent le minimum de technologie est assuré.</li>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingTwo">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseTwo" aria-expanded = "true" aria-controls = "collapseTwo">
                                                            Q. A propos
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseTwo" class = "collapse" aria-labelledby = "headingTwo" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            En choisissant l'IPSAS, vous faites le choix d'apprendre à penser, à réagir et à gérer des situations. Grace à un corps enseignant totalement impliqué dans ce processus d'acquisition d'une méthode en plus des connaissances, l'IPSAS peut d'ores et déjà être fière de ses diplômés qui font carrières en Tunisie et partout en Afrique et dans le monde.
                                                            <br><br>
                                                            En devenant étudiant de l'IPSAS vous faites un choix, le meilleur, et vous vous garantissez la possibilité de choisir votre métier demain. A mesure que vous avancez dans votre visite de notre site, vous sentirez, nous l'espérons, que vous faites partie du monde de l'IPSAS, celui d'un avenir qui peut se réaliser.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingThree">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseThree" aria-expanded = "true" aria-controls = "collapseThree">
                                                            Q. Formations
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseThree" class = "collapse" aria-labelledby = "headingThree" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            <h5>• Diplôme national d'architecte</h5>
                                                            <h5>• Cycles préparatoires</h5>
                                                            <p class = "mx-4">• Physique - Technologie</p>
                                                            <p class = "mx-4">• Physique - Chimie</p>
                                                            <p class = "mx-4">• Math - Physique</p>
                                                            <h5>• Les licences</h5>
                                                            <p class = "mx-4">• Licence nationale en informatique de gestion</p>
                                                            <p class = "mx-4">• Licence nationale en génie mécanique</p>
                                                            <h5>• Cycles d'ingénieurs</h5>
                                                            <p class = "mx-4">• Génie civil</p>
                                                            <p class = "mx-4">• Génie électromécanique</p>
                                                            <p class = "mx-4">• Génie énergétique</p>
                                                            <p class = "mx-4">• Génie électrotechnique et électricité industrielle</p>
                                                            <p class = "mx-4">• Génie informatique</p>
                                                            <p class = "mx-4">• Génie indistruel</p>
                                                            <p class = "mx-4">• Génie pétrolier</p>
                                                            <h5>• Les masters</h5>
                                                            <p class = "mx-4">• Génie de l'environnement, de la sécurité et de la qualité</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingFour">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseFour" aria-expanded = "true" aria-controls = "collapseFour">
                                                            Q. Nos partenaires
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseFour" class = "collapse" aria-labelledby = "headingFour" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            <h5>• Académiques</h5>
                                                            <p class = "mx-4">• UNIVERSITÉ D'ARCHITECTURE DE SOFIA</p>
                                                            <p class = "mx-4">• ECOLE NATIONALE DES MINES D'ALÈS</p>
                                                            <p class = "mx-4">• ECOLE NATIONALE DES MINES DE SAINT ETIENNE</p>
                                                            <p class = "mx-4">• UNIVERSITÉ TECHNIQUE DE SOFIA</p>
                                                            <p class = "mx-4">• UNIVERSITÉ JEAN MONNET DE SAINT ETIENNE</p>
                                                            <p class = "mx-4">• L’INSTITUT SUPÉRIEUR DES ETUDES TECHNOLOGIQUES DE SFAX</p>
                                                            <h5>• Industriels</h5>
                                                            <p class = "mx-4">• SIMATEC</p>
                                                            <p class = "mx-4">• SORETOL</p>
                                                            <p class = "mx-4">• EBP</p>
                                                            <p class = "mx-4">• NEW ENGINEERING IT</p>
                                                            <p class = "mx-4">• MINISTRE DE L'EQUIPEMENT ET DE L'HABITAT</p>
                                                            <p class = "mx-4">• BAT</p>
                                                            <p class = "mx-4">• ABID GROUP</p>
                                                            <p class = "mx-4">• SOTECA ELECTRIC</p>
                                                            <p class = "mx-4">• SOLDER</p>
                                                            <p class = "mx-4">• SOFAP</p>
                                                            <p class = "mx-4">• FAST</p>
                                                            <p class = "mx-4">• PLASTLO SFAX</p>
                                                            <p class = "mx-4">• CLINI SYS</p>
                                                            <p class = "mx-4">• FOGITS</p>
                                                            <p class = "mx-4">• CLINI SYS</p>
                                                            <p class = "mx-4">• MAS</p>
                                                            <p class = "mx-4">• ASM</p>
                                                            <p class = "mx-4">• JAGORA</p>
                                                            <p class = "mx-4">• TEKAB.DEV</p>
                                                            <p class = "mx-4">• MATEM GROUP</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class = "card mb-0">
                                                <div class = "card-header" id = "headingFive">
                                                    <h5 class = "m-0">
                                                        <a class = "custom-accordion-title d-block py-1" data-bs-toggle = "collapse" href = "#collapseFive" aria-expanded = "true" aria-controls = "collapseFive">
                                                            Q. Contact
                                                            <i class = "mdi mdi-chevron-down accordion-arrow"></i>
                                                        </a>
                                                    </h5>
                                                    <div id = "collapseFive" class = "collapse" aria-labelledby = "headingFive" data-bs-parent = "#custom-accordion-one">
                                                        <div class = "card-body">
                                                            Pour contacter l'IPSAS vous pouvez :<br>
                                                            • Naviguer sur note site web <strong><a href = "https://ipsas-ens.net/" target = "_blank">IPSAS</a></strong><br>
                                                            • Envoyez-nous un e-mail sur <strong>contact@ipsas.ens.net</strong><br>
                                                            • Appelez le numéro <strong> (+ 216) 74 225 665</strong> ou <strong> 39 185 855</strong><br>
                                                            • Placer-vous à l'adresse <strong>Avenue 5 Août Rue Saîd Aboubaker 3002 Sfax-Tunisie. </strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include("Layouts.footer")
            </div>
        </div>
        @include("Layouts.right_navbar")
        @include("Layouts.scripts_site")
    </body>
</html>