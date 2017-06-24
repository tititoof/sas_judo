#!/usr/bin/sh

docker-compose run sonarcli sonar-runner $1
docker run --link sasjudo54_sonarcli_1:sonarqube \
  --entrypoint /opt/sonar-runner-2.4/bin/sonar-runner \
  -e SONAR_USER_HOME=/data/.sonar-cache \
  -v $(pwd):/data -u $(id -u) sebp/sonar-runner \
    -Dsonar.host.url=http://sonarqube:9090 \
    -Dsonar.jdbc.url=jdbc:h2:tcp://sonarqube/sonar \
    -Dsonar.jdbc.username=sonar \
    -Dsonar.jdbc.password=sonar \
    -Dsonar.jdbc.driverClassName=org.h2.Driver \
    -Dsonar.embeddedDatabase.port=9092
#sudo docker exec -it sonarunnerdocker_sonarrunner_1 bash
