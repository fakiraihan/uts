pipeline {
    agent any

    environment {
        SONAR_TOKEN = credentials('sonarqube-token')
    }
    stages {
        stage('Checkout') {
            steps {git branch: 'main', url: 'https://github.com/fakiraihan/uts'}
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
                    bat 'C:\\sonar-scanner\\bin\\sonar-scanner.bat'
                }
            }
        }
    }
    post {
        failure { echo 'Pipeline gagal, cek log.' }
    }
}

