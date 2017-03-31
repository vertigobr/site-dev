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
sudo mysql wordpress < ../mysql/201702211701-site.dump
sudo mysql -e 'GRANT ALL ON wordpress.* TO wordpress'
sudo mysql -e 'SET PASSWORD FOR wordpress = PASSWORD("F7AYUbrBGx")'
sudo sh -c 'echo "127.0.0.1 mysql" >> /etc/hosts'
```

# Local

Se quiser operar o MySQL localmente o Docker é seu amigo:

```sh
docker pull mysql:5.5
docker run --name sitedb -d \
  -v $(pwd)/.data:/var/lib/mysql \
  -e MYSQL_RANDOM_ROOT_PASSWORD=yes \
  -e MYSQL_USER=wordpress \
  -e MYSQL_PASSWORD=F7AYUbrBGx \
  mysql:5.5
```
