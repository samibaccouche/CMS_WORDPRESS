pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                // Cette étape est gérée automatiquement par Jenkins si tu as configuré le job SCM
                echo 'Récupération du code depuis GitLab...'
                checkout scm
            }
        }

//        stage('Static Analysis') {
  //          steps {
    //            echo 'Vérification de la syntaxe PHP...'
                // On vérifie s'il y a des erreurs de syntaxe sans exécuter le code
      //          sh 'find . -name "*.php" -exec php -l {} \\;'
      //      }
     //   }

	   stage('Deploy to VM2') {
               steps {
                // On utilise le credential SSH pour parler à VM2
				   	   sh 'cd ~/ansible'
                       sh 'ansible-playbook -i inventory.ini site.yml'
                }
            }
       

    }

}
