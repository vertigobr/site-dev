Codenvy Apache
======

No Codenvy o stack de PHP já possui um Apache+PHP embarcado. Para que o document root funcione corretamente com este projeto:

```sh
sudo sed 's/\tDocumentRoot .*/\tDocumentRoot \/projects\/site-vertigo\/html/g' -i /etc/apache2/sites-enabled/000-default.conf
```

Para desabilitar o redirect padrão do WordPress (que impede testar o site dentro do Codenvy) basta acrescentar no `functions.php` do tema:

```sh
remove_filter('template_redirect','redirect_canonical');
```
