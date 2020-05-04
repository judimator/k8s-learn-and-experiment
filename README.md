##Installation

### Docker-compose
* Build images 
    ```bash
    $ docker-compose build
    ```
* Install dependencies
    ```bash
    $ docker-compose exec php-fpm sh
    $ composer install
    ```
* Run containers
    ```bash
    $ docker-compose up -d
    ```
* Open  **http://symfony.local**
* Enjoy!

### K8s
* Create `Secret`. Please note, the names of key and certificate should be "tls", i.e. tls.crt and tls.key
    ```bash
    $ openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout $(KEY) -out $(CERT) -subj "/CN=nginxsvc/O=nginxsvc"
    $ kubectl create secret tls nginx-crt --key $(KEY) --cert $(CERT)
    $ kubectl create secret generic app-secrets --from-env-file=k8s/secrets/.env.app.secrets
    $ kubectl create secret generic db-secrets --from-env-file=k8s/secrets/.env.db.secrets
    ```
* Create `ConfigMap`:
    ```bash
    $ kubectl create configmap nginx --from-file=k8s/config/nginx/conf.d
    $ kubectl create configmap symfony.ini --from-file=k8s/config/php-fpm/conf.d/symfony.ini
    $ kubectl create configmap symfony.pool.conf --from-file=k8s/config/php-fpm/php-fpm.d/symfony.pool.conf
    $ kubectl create configmap nginx.conf --from-file=k8s/config/nginx/nginx.conf
    $ kubectl create configmap app-config --from-env-file=k8s/.env
    ```
* Apply available k8 controllers:
    ```bash
    $ kubectl apply -f k8s/deployment.yml
    $ kubectl apply -f k8s/service.yml
    $ kubectl apply -f k8s/ingress.yml
    $ kubectl apply -f k8s/statefulset.yml
    ```
* Verify the IP address is set:
    ```bash
    $ kubectl get ingress
    ```
* Add the following line to the bottom of the **/etc/hosts** file:
    ```text
     YOUR_ADDRESS symfony.localhost
    ```
* Open  **http://symfony.local**
* Enjoy!
