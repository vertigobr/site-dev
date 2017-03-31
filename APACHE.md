Apache
======

# Codenvy

No Codenvy o stack de PHP já possui um Apache+PHP embarcado. Para que o document root funcione corretamente com este projeto:

```sh
sudo sed 's/\tDocumentRoot .*/\tDocumentRoot \/projects\/site-dev\/php/g' -i /etc/apache2/sites-enabled/000-default.conf
```

Para desabilitar o redirect padrão do WordPress (que impede testar o site dentro do Codenvy) basta acrescentar no `functions.php` do tema:

```sh
remove_filter('template_redirect','redirect_canonical');
```

# Local

A execução local deste projeto com Docker é feita com o docker-compose:

```sh
docker-compose up
```

Isto irá subir dois containers (WordPress e MySQL) devidamente configurados e montando a pasta 'php' deste projeto como a raiz de documentos do Apache.

Como o projeto ainda tem muitas URLs "hard-coded" convém acrescentar no arquivo "/etc/hosts" local:

```
127.0.0.1 vertigo.com.br
```
