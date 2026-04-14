pipeline {
    agent any

    stages {

        stage('Checkout Infra (DEVOPS)') {
            steps {
                dir('infra') {
                    git branch: 'main', url: 'https://gitlab.com/ansible.git'
                }
            }
        }




        stage('Deploy') {
            steps {
                sh '''
                cd infra
                ansible-playbook -i inventory.ini site.yml
                '''
            }
        }
    }
}
