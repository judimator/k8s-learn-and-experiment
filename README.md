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

### K8s
* Create `ConfigMap`:
    ```bash
    $ kubectl create configmap nginx --from-file=k8s/config/nginx/conf.d
    $ kubectl create configmap symfony.ini --from-file=k8s/config/php-fpm/conf.d/symfony.ini
    $ kubectl create configmap xdebug.ini --from-file=k8s/config/php-fpm/conf.d/xdebug.ini
    $ kubectl create configmap symfony.pool.conf --from-file=k8s/config/php-fpm/php-fpm.d/symfony.pool.conf
    $ kubectl create configmap nginx.conf --from-file=k8s/config/nginx/nginx.conf
    ```
* Apply available k8 controllers:
    ```bash
    $ kubectl apply -f deployment.yml
    $ kubectl apply -f service.yml
    $ kubectl apply -f ingress.yml
    ```
* Verify the IP address is set:
    ```bash
    $ kubectl get ingress
    ```
* Add the following line to the bottom of the **/etc/hosts** file:
    ```text
     YOUR_ADDRESS symfony.local
    ```
* Open  **http://symfony.local**
* Enjoy!
