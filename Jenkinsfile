pipeline {
    agent any

    stages {
        stage('Nettoyage') {
            steps {
                echo 'Nettoyage de l\'espace de travail...'
                deleteDir()
            }
        }

        // Pas besoin de stage Checkout Code — Jenkins le fait automatiquement
        // Le code est déjà dans /var/lib/jenkins/workspace/ci-dev

        stage('Build') {
            steps {
                echo '=== Installation des dépendances ==='
                script {
                    if (fileExists('composer.json')) {
                        sh 'composer install --no-dev --optimize-autoloader --no-interaction'
                    } else {
                        echo '⚠️ composer.json non trouvé - Skip Composer'
                    }
                    
                    if (fileExists('package.json')) {
                        sh 'npm ci --only=production || npm install --only=production'
                        // Vérifier si un script build existe
                        sh '''
                            if grep -q "\"build\"" package.json; then
                                npm run build
                            else
                                echo "⚠️ Pas de script build dans package.json"
                            fi
                        '''
                    } else {
                        echo '⚠️ package.json non trouvé - Skip NPM'
                    }
                }
            }
        }

        stage('Vérification') {
            steps {
                echo '=== Structure du projet ==='
                sh 'ls -lh'
                echo '=== Vérification WordPress ==='
                sh '''
                    test -f wp-config.php && echo "✅ wp-config.php trouvé" || echo "⚠️ wp-config.php manquant"
                    test -d wp-content && echo "✅ wp-content trouvé" || echo "⚠️ wp-content manquant"
                    test -d wp-content/themes && echo "✅ Dossier themes trouvé" || echo "⚠️ Dossier themes manquant"
                '''
            }
        }
    }

    post {
        success {
            echo '✅ Pipeline réussi !'
        }
        failure {
            echo '❌ Pipeline échoué. Vérifie les logs ci-dessus.'
        }
    }
}
