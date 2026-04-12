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
                cd ansible
                ansible-playbook -i inventory.ini site.yml
                '''
            }
        }
    }
}
