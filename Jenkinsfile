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

    }
}

