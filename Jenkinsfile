pipeline {
    agent any 

    environment {
        // L'ID que tu as créé dans Jenkins pour ton Token GitLab
        GIT_CREDS = 'GITLAB_TOKEN' 
    }

    stages {
        stage('Nettoyage') {
            steps {
                echo 'Nettoyage de l’espace de travail...'
                deleteDir()
            }
        }

        stage('Checkout Code') {
            steps {
                echo 'Récupération du code depuis GitLab...'
                git branch: 'main', 
                    credentialsId: "${GIT_CREDS}", 
                    url: 'https://gitlab.com/samibaccouche/wordpress_app.git'
            }
        }

        stage('Vérification des fichiers') {
            steps {
                echo 'Liste des fichiers récupérés :'
                sh 'ls -lh'
                echo 'Vérification de la présence de la base de données...'
                sh 'test -f cms_dump.sql && echo "Base de données trouvée !" || echo "Fichier SQL manquant"'
            }
        }
    }
    
    post {
        success {
            echo 'Test réussi ! Jenkins a bien récupéré ton projet.'
        }
        failure {
            echo 'Le test a échoué. Vérifie tes identifiants ou le nom de la branche.'
        }
    }
}
