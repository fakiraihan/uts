pipeline {
    agent any
    environment {
        SONAR_TOKEN = credentials('squ_d1080fe7195e87bc5d23dae2f78b50018edb9a26')
    }
    stages {
        stage('Checkout') {
            steps { git 'https://github.com/fakiraihan/uts' }
        }
        stage('Install Dependencies') {
            steps { bat 'composer install' }
        }
        stage('Run PHPUnit') {
            steps { bat 'vendor\\bin\\phpunit --configuration phpunit.xml' }
        }
        stage('SonarQube Analysis') {
            steps {
                withSonarQubeEnv('SonarQube') {
                    bat 'E:\\Prog\\sonar-scanner\\bin\\sonar-scanner.bat'
                }
            }
        }
    }
    post {
        failure { echo 'Pipeline gagal, cek log.' }
    }
}

