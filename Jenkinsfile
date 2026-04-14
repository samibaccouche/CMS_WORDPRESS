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
//        stage('Static Analysis') {
  //          agent any  // Sur VM1
    //        steps { 
      //          sh 'find . -name "*.php" -exec php -l {} \\; | grep -v "No syntax errors" || test $? -eq 1' 
        //    }
     //   }


