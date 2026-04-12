pipeline {
    stages {

        stage('Checkout Infra') {
            steps {
                git url: 'infra-repo'
            }
        }

        stage('Checkout App') {
            steps {
                git url: 'app-repo'
            }
        }

        stage('Deploy') {
            steps {
                sh '''
                pwd 
                ssh 192.168.56.11
                '''
            }
        }
    }
}
