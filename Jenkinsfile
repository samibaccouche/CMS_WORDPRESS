stage('SonarQube Analysis') {
            steps {
                script {
                    def scannerHome = tool 'SonarScanner'
                    withSonarQubeEnv("${SONAR_SERVER}") {
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

        stage('Deploy') {
            steps {
                sh '''
                cd infra
                ansible-playbook -i inventory.ini site.yml
                '''
            }
        }
