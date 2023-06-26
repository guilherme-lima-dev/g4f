# g4f

Para rodar primeiro suba o container. Na pasta raiz g4f rode o seguinte comando:

docker compose up --build -d

entre no container com:

docker exec -it g4f_php /bin/sh

navegue até a pasta project:

cd project

copie o arquivo .env.example para um arquivo .env

cp .env.example .env

instale as dependências com composer:

composer install

precisamos gerar a chave do laravel

php artisan key:generate

agora é só rodar as migrations e seeders:

php artisan migrate --seed

Pronto, nosso sistema está configurado, agora é só acessar no navegador:

php -S 0.0.0.0:9002 -t public

Acesse no seu navegador http://localhost:9002
