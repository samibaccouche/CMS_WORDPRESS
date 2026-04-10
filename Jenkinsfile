pipeline {
    agent any
    environment {
        GIT_CREDS = 'GITLAB_TOKEN'
    }

    stages {
        stage('Nettoyage') {
            steps { deleteDir() }
        }

        stage('Checkout Code') {
            steps {
                git branch: 'main', 
                    credentialsId: '${GITLAB_TOKEN}',
                    url: 'https://gitlab.com/samibaccouche/wordpress_app.git'
            }
        }

        stage('Build') {  
            steps {
                sh 'composer install --no-dev'
                sh 'npm ci'
                sh 'npm run build'
            }
        }
        
        stage('Vérification') {
            steps {
                sh 'ls -lh wp-content/themes/'
                sh 'ls -lh wp-content/plugins/'
            }
        }
    }
}
