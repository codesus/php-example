docker-compose up -d --build
docker compose up -d phpmyadmin
docker-compose down

El flag --build construirá la imagen con el Dockerfile. Solo necesitas hacerlo una vez, o cuando modifiques el Dockerfile.