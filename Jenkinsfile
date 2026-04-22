pipeline {
    agent any

    environment {
        // Doit correspondre au nom dans "Manage Jenkins > System"
        SONAR_SERVER = 'SonarQube'
    }

    stages {
        stage('Checkout Infra (DEVOPS)') {
            steps {
                dir('infra') {
                    git branch: 'main', url: 'https://gitlab.com/samibaccouche/ansible.git'
                }
            }
        }

        // Stage commenté comme tu l'as demandé
        /*
        stage('Static Analysis') {
            steps {
                sh 'find . -name "*.php" -exec php -l {} \\; | grep -v "No syntax errors" || test $? -eq 1'
            }
        }
        */

        stage('SonarQube Analysis') {
            steps {
                script {
                    // Doit correspondre au nom dans "Global Tool Configuration"
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
    } // Fin des stages
} // Fin du pipeline
