pipeline {
    agent none
    
    stages {
        stage('Checkout') {
            agent any  // Sur VM1 (control-plane)
            steps { 
                checkout scm 
            }
        }

	stage('Debug') {
    	    steps {
            sh 'whoami'
            sh 'pwd'
            sh 'ls -la'
    }
}

//        stage('Static Analysis') {
  //          agent any  // Sur VM1
    //        steps { 
      //          sh 'find . -name "*.php" -exec php -l {} \\; | grep -v "No syntax errors" || test $? -eq 1' 
        //    }
     //   }

<<<<<<< HEAD
=======
        stage('Deploy with Ansible') {
            agent { 
                label 'vm2-agent'  // ← Nom de TON agent
            }
            steps {
                sh '''
                    cd ~/ansible/
                    ansible-playbook -i inventory.ini site.yml
                '''
            }
        }
>>>>>>> d1aeaec6c8550124b8da647d2d413ef085c742bf
    }
}

