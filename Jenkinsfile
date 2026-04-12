pipeline {
    agent any

    stages {

        stage('Checkout App (DEV)') {
            steps {
                dir('app') {
                    git branch: 'main', url: 'https://gitlab.com/wordpress_app.git'
                }
            }
        }

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
                cd /infra
                ansible-playbook -i inventory.ini site.yml
                '''
            }
        }
    }
}
