FROM node:lts-alpine

# Установите bash и другие необходимые пакеты
RUN apk update && apk add bash

# Установка рабочей директории в контейнере
WORKDIR /var/www/discord-bot-node

# Копирование зависимостей проекта
COPY package*.json ./

# Установка зависимостей
RUN npm install

RUN npm install -g nodemon
# Копирование остальных файлов проекта
COPY . .

# Открытие порта, который будет слушать ваше приложение
EXPOSE 3000

# Команда для запуска приложения
CMD ["nodemon", "-L", "index"]
