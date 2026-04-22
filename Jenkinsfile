pipeline {
    agent any

    environment {
        // Définit le nom de l'installation SonarQube configurée dans Jenkins System
        SONAR_SERVER = 'sonaranalyse'
    }

    stages {
        stage('Checkout Infra (DEVOPS)') {
            steps {
                dir('infra') {
                    git branch: 'main', url: 'https://gitlab.com/samibaccouche/ansible.git'
                }
            }
        }

        stage('Static Analysis') {
            steps {
                // Vérification syntaxique PHP rapide
                sh 'find . -name "*.php" -exec php -l {} \\; | grep -v "No syntax errors" || test $? -eq 1'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                script {
                    // Récupère le scanner configuré dans Global Tool Configuration
                    def scannerHome = tool 'sonarqube'

                    // Utilise l'environnement SonarQube (Token + URL)
                    withSonarQubeEnv("${SONAR_SERVER}") {
                        sh "${scannerHome}/bin/sonar-scanner \
                            -Dsonar.projectKey=refops-wordpress \
                            -Dsonar.projectName='PFE WordPress Refops' \
                            -Dsonar.sources=. \
                            -Dsonar.php.exclusions=**/vendor/**,**/infra/**,**/ansible/** \
                            -Dsonar.language=php \
                            -Dsonar.sourceEncoding=UTF-8"
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
    }
}

