pipeline{
    agent {
        docker {
            image 'docker/compose:1.29.2'
            args '-v /var/run/docker.sock:/var/run/docker.sock'
        }
    }
    
    environment{
        COMPOSE_PROJECT_NAME = "ZCAMISETA-pipeline"
    }

    stages{
        stage('Clonar repositorio'){
            steps{
                checkout scm
            }
        }
        stage('contruir contenedores'){
            steps{
                sh 'ls -l'
                sh 'docker --version'
                sh 'docker compose --version'
                sh 'docker-compose build --no-cache'
            }
        }
        // stage('Verificar archivos en contenedores'){
        //     steps{
        //         sh 'docker-compose run --rm app ls -R /laravel-app'
        //     }
        // }
        // stage('Ejecutar pruebas'){
        //     steps{
        //         sh ''
        //     }
        // }
        // stage('Desplegar'){
        //     steps{
        //         sh 'docker compose up'
        //     }
        // }
    }
}