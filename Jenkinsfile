pipeline {
    stages {
        stage('Build') {
            steps {
                echo "Build app"
            }
        }

        stage('Trigger Deploy') {
            steps {
                build job: 'deploy-pipeline'
            }
        }
    }
}
