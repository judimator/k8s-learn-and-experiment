FROM alpine:3.8

RUN apk add --update --no-cache nginx

COPY ./app /var/www/app

RUN adduser -D -g '' -G www-data www-data

CMD ["nginx"]
