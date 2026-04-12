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
                ansible-playbook -i inventory.ini site.yml
                ssh 192.168.56.11
                '''
            }
        }
    }
}
