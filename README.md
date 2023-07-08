# i-Educar Transporte

Módulo de transporte para o [i-Educar](https://github.com/portabilis/i-educar).

## Instalação

> Para usuários Docker, executar os comandos `# (Docker)` ao invés da linha seguinte.

Clone este repositório a partir da raiz do i-Educar:

```bash
git clone git@github.com:portabilis/i-educar-transport-package.git packages/portabilis/i-educar-transport-package
```

Instale o pacote:

```bash
# (Docker) docker-compose exec php composer plug-and-play
composer plug-and-play
```

Execute as migrações:
 
```bash
# (Docker) docker-compose exec php artisan migrate
php artisan migrate
```

## Perguntas frequentes (FAQ)

Algumas perguntas aparecem recorrentemente. Olhe primeiro por aqui: [FAQ](https://github.com/portabilis/i-educar-website/blob/master/docs/faq.md).

---

Powered by [Portábilis](https://portabilis.com.br/).
