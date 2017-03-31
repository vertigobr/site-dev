MySQL
======

# Codenvy

No Codenvy o stack de PHP já possui um MySQL embarcado. Para operar com ele em um novo workspace:

```sh
sudo service mysql start
```

Para inicializar o banco com o conteúdo do backup do site:

```sh
sudo mysql -e 'CREATE DATABASE wordpress'
sudo mysql -e 'CREATE USER wordpress'
sudo mysql wordpress < ../mysql/site_database.dump
sudo mysql -e 'GRANT ALL ON wordpress.* TO wordpress'
sudo mysql -e 'SET PASSWORD FOR wordpress = PASSWORD("F7AYUbrBGx")'
sudo sh -c 'echo "127.0.0.1 mysql" >> /etc/hosts'
```

# Local

Se quiser operar o MySQL localmente o Docker é seu amigo: o comando abaixo roda o MySQL, cria o banco wordpress e importa o dump disponível neste projeto:

```sh
docker pull mysql:5.5
docker run --name sitedb -d \
  -v $(pwd)/.data:/var/lib/mysql \
  -e MYSQL_RANDOM_ROOT_PASSWORD=yes \
  -e MYSQL_DATABASE=wordpress \
  -e MYSQL_USER=wordpress \
  -e MYSQL_PASSWORD=F7AYUbrBGx \
  -v $(pwd)/mysql/site_database.dump:/docker-entrypoint-initdb.d/site_database.sql \
  mysql:5.5
```

Para entrar no MySQL a qualquer momento já conectado ao banco wordpress:

```sh
docker exec -ti sitedb mysql -uwordpress -pF7AYUbrBGx wordpress
```

Ou para rodar comandos arbitrários:

```sh
docker exec -ti sitedb mysql -uwordpress -pF7AYUbrBGx wordpress -e 'SHOW TABLES;'
```
