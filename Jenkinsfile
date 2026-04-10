pipeline {
    agent any

    stages {
        // Le checkout est automatique - ne pas le toucher
        
        stage('Build') {
            steps {
                echo '=== Installation des dépendances ==='
                script {
                    if (fileExists('composer.json')) {
                        sh 'composer install --no-dev'
                    } else {
                        echo '⚠️ composer.json non trouvé'
                    }
                    
                    if (fileExists('package.json')) {
                        sh 'npm ci --only=production'
                        sh 'npm run build'
                    } else {
                        echo '⚠️ package.json non trouvé'
                    }
                }
            }
        }

        stage('Vérification') {
            steps {
                echo '=== Fichiers présents ==='
                sh 'ls -la'
                echo '=== Vérification WordPress ==='
                sh '''
                    test -f wp-config.php && echo "✅ wp-config.php" || echo "❌ wp-config.php"
                    test -d wp-content && echo "✅ wp-content" || echo "❌ wp-content"
                    test -d wp-admin && echo "✅ wp-admin" || echo "❌ wp-admin"
                    test -d wp-includes && echo "✅ wp-includes" || echo "❌ wp-includes"
                '''
            }
        }
    }
}
