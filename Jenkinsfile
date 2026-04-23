pipeline {
    agent any

    environment {
        // Nom du serveur configuré dans Jenkins > System
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
                // Vérification syntaxique PHP
                sh 'find . -name "*.php" -exec php -l {} \\; | grep -v "No syntax errors" || test $? -eq 1'
            }
        }

        stage('SonarQube Analysis') {
            steps {
                script {
                    // Récupère le scanner configuré dans Global Tool Configuration
                    def scannerHome = tool 'sonarqube'

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
                // Exécution du playbook Ansible
                dir('infra') {
                    sh 'ansible-playbook -i inventory.ini site.yml'
                }
            }
        }
    }

    post {
        success {
            mail to: 'baccouchesami499@gmail.com',
                 subject: "✅ Build Success: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                 body: "Le pipeline a réussi ! WordPress est déployé et l'analyse SonarQube est disponible."
        }
        failure {
            mail to: 'baccouchesami499@gmail.com',
                 subject: "❌ Build Failed: ${env.JOB_NAME} #${env.BUILD_NUMBER}",
                 body: "Le pipeline a échoué. Vérifie les logs sur Jenkins pour corriger l'erreur."
        }
    }
}
