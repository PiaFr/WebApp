## Run
Composer und Docker [Docker](https://docs.docker.com/) müssen installiert sein

Repository clonen

    git clone https://github.com/PiaFr/WebApp.git

 Change directory

    cd WebApp

  Dependencies installieren

    composer install

  Docker Container bauen und hochfahren

    docker-compose up -d
  
  Aufrufen unter

    http://localhost:8080

Zum Beenden der Container `docker-compose kill`, und zum Entfernen `docker-compose rm`
