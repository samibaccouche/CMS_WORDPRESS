stage('SonarQube Analysis') {
            steps {
                script {
                    // ATTENTION : 'SonarScanner' doit être le NOM EXACT dans Global Tool Configuration
                    def scannerHome = tool 'SonarScanner' // <--- VERIFIE CE NOM ICI 🔍

                    withSonarQubeEnv("${SONAR_SERVER}") {
                        // Utilise bien les \ à la fin de chaque ligne sauf la dernière
                        sh "${scannerHome}/bin/sonar-scanner \
                            -Dsonar.projectKey=refops-wordpress \
                            -Dsonar.projectName='PFE WordPress Refops' \
                            -Dsonar.sources=. \
                            -Dsonar.language=php \
                            -Dsonar.sourceEncoding=UTF-8 \
                            -Dsonar.exclusions=wp-admin/**,wp-includes/**,infra/**,ansible/**,wp-content/plugins/**,wp-content/themes/astra/**,wp-content/themes/twentytwentyfive/**" 
                    }
                }
            }
        }
