Codenvy MySQL
======

No Codenvy o stack de PHP já possui um MySQL embarcado. Para operar com ele em um novo workspace:

```sh
sudo service mysql start
sudo mysql -e 'CREATE DATABASE wordpress'
sudo mysql -e 'CREATE USER wordpress'
sudo mysql wordpress < ../mysql/201702211701-site.dump
sudo mysql -e 'GRANT ALL ON wordpress.* TO wordpress'
sudo mysql -e 'SET PASSWORD FOR wordpress = PASSWORD("F7AYUbrBGx")'
sudo sh -c 'echo "127.0.0.1 mysql" >> /etc/hosts'
```
