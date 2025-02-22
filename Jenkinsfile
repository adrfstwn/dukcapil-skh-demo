pipeline {
    agent any
    environment {
        IMAGE_TAG = "${env.BUILD_ID}"
        GIT_BRANCH = "main"
        DOCKER_IMAGE_NAME = "dukcapil-laravel"
    }
    stages {
        stage('Checkout Code') {
            steps {
                script {
                    sh """
                    echo "Cleaning workspace..."
                    rm -rf dukcapil-skh-demo || true
                    """
                    withCredentials([usernamePassword(credentialsId: 'github-auth-to-jenkins', usernameVariable: 'GIT_USER', passwordVariable: 'GIT_TOKEN')]) {
                        sh """
                        echo "Cloning repository with authentication..."
                        git clone https://${GIT_USER}:${GIT_TOKEN}@github.com/adrfstwn/dukcapil-skh-demo.git -b ${GIT_BRANCH}
                        """
                    }
                }
            }
        }
        stage('Prepare .env File') {
            steps {
                script {
                    withCredentials([file(credentialsId: 'dukcapil-skh-env', variable: 'ENV_FILE')]) {
                        sh """
                        echo "Creating .env file..."
                        cp \${ENV_FILE} dukcapil-skh-demo/.env
                        """
                    }
                }
            }
        }
        stage('Stop Running Containers') {
            steps {
                script {
                    sh """
                    echo "Stopping running container..."
                    
                    cd dukcapil-skh-demo
                    
                    if docker ps -a | grep dukcapil-laravel; then
                        docker compose down || true
                    fi
                    """
                }
            }
        }
        stage('Build & Deploy Docker Image') {
            steps {
                script {
                    sh """
                    echo "Updating docker-compose.yml with new image tag..."
                    
                    cd dukcapil-skh-demo
                    
                    # Update image tag in docker-compose.yml
                    sed -i "s|image:.*|image: ${DOCKER_IMAGE_NAME}:${IMAGE_TAG}|" docker-compose.yml
                    
                    echo "Final docker-compose.yml content:"
                    cat docker-compose.yml
                    
                    echo "Building Docker image locally..."
                    docker compose build --no-cache
                    
                    echo "Deploying container using docker compose..."
                    docker compose up -d --force-recreate
                    
                    echo "Checking working directory in the container..."
                    docker exec dukcapil-laravel pwd
                    docker exec dukcapil-laravel ls -al /app
                    """
                }
            }
        }
    }
    post {
        success {
            echo "Pipeline completed successfully!"
        }
        failure {
            echo "Pipeline failed!"
        }
    }
}